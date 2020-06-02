<?php
//topic.php
include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']
// $sql = "SELECT
//             cat_id,
//             cat_name,
//             cat_description
//         FROM
//             categories
//         WHERE
//             cat_id = " . mysqli_real_escape_string($conn,$_GET['id']);

$sql=   "SELECT
            topic_id,
            topic_subject
        FROM
            topics
        WHERE
            topics.topic_id = " . mysqli_real_escape_string($conn,$_GET['id']);

echo '<br>';

echo $sql;

echo '<br>';
 
$result = mysqli_query($conn,$sql);
 
if(!$result)
{
    echo 'The Topic could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This Topic does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>Reply in ′' . $row['topic_subject'] . '′ topics</h2>';
        }
     
        //do a query for the topics
        // $sql = "SELECT  
        //             topic_id,
        //             topic_subject,
        //             topic_date,
        //             topic_cat
        //         FROM
        //             topics
        //         WHERE
        //             topic_cat = " . mysqli_real_escape_string($conn,$_GET['id']);

        // $sql =  "SELECT
        //             posts.post_topic,
        //             posts.post_content,
        //             posts.post_date,
        //             posts.post_by,
        //             users.user_id,
        //             users.user_name
        //         FROM
        //             posts
        //         LEFT JOIN
        //             users
        //         ON
        //             posts.post_by = users.user_id
        //         WHERE
        //             posts.post_topic = " . mysqli_real_escape_string($conn,$_GET['id']);

        $sql =  "SELECT p.post_topic,
                        p.post_content, 
                        p.post_date, 
                        p.post_by, 
                        u.user_id, 
                        u.user_name, 
                        t.topic_by,
                        t.topic_subject
                FROM posts p
                JOIN users u ON (p.post_by = u.user_id)
                JOIN topics t ON (p.post_topic = t.topic_id)
                WHERE p.post_topic = " . mysqli_real_escape_string($conn,$_GET['id']);

        // echo $sql;
         
        $result = mysqli_query($conn,$sql);

        if(!$result)
        {
            echo 'The reply could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no reply in this topic yet.';
            }
            else
            {
                $table_head = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $result = mysqli_query($conn,$sql);
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>';
                echo $table_head['topic_subject'];
                echo '</th>
                        <th></th>
                      </tr>'; 
                echo '<h1>'.$row['topic_subject'].'</h1>';
                while($row = mysqli_fetch_assoc($result))
                {           
                   
                    echo '<tr>';
                        echo '<td class="leftpart">';
                        echo $row['post_topic'];
                        echo $row['post_content'];
                        echo   $row['post_date'];
                        echo   $row['post_by'];
                        echo   $row['user_id'];
                        echo   $row['user_name'];
                        echo   $row['topic_by'];
                        echo   $row['topic_subject'];    
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo $row['post_content'];
                            echo date('d-m-Y', strtotime($row['post_date']));
                        echo '</td>';
                    echo '</tr>';
                    // echo var_dump($row);

                }
            }
        }
    }
}




echo    '<form method="post" action="reply.php?id=' . $_GET['id'] . '">
            <textarea name="reply-content"></textarea>
            <input type="submit" value="Submit reply" />
        </form>';
include 'footer.php';
?>