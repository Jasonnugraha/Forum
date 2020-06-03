<?php
//topic.php
include 'connect.php';
include 'header.php';

$sql=   "SELECT
            topic_id,
            topic_subject
        FROM
            topics
        WHERE
            topics.topic_id = " . mysqli_real_escape_string($conn,$_GET['id']);
 
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
                // echo '<div>';
                echo '<table class="table table-striped table-bordered">
                      <tr>
                        <th colspan="2" >';
                echo $table_head['topic_subject'];
                echo '</th>
                      </tr>'; 
                // echo '<h1>'.$row['topic_subject'].'</h1>';
                while($row = mysqli_fetch_assoc($result))
                {           
                    echo '<tr>';
                        echo '<td>';
                        echo   $row['user_name'];
                        echo '<br>';
                        echo date('d-m-Y', strtotime($row['post_date']));
                        echo '</td>';
                        echo '<td>';
                            echo $row['post_content'];
                        echo '</td>';
                    echo '</tr>';
                }
            }
            
        }
    }
}
// echo '</div>';

include 'footer.php';
?>