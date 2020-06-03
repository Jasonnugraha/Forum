<?php 
include 'connect.php';
include 'header.php';


if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo 
    //     '<form method="post" action="">
    //     <div class="form-group">
    //     <label for="username">Username: </label>
    //     <input type="text" name="user_name" placeholder="Enter Username"/>
    //     </div>
    //     <div class="form-group">
    //     <label for="password">Password: </label>
    //     <input type="password" name="user_pass" placeholder="Enter Password">
    //     </div>
    //     <div class="form-group">
    //     <label for="password">Retype Password: </label>
    //     <input type="password" name="user_pass_check" placeholder="Retype Password">
    //     </div>
    //     <div class="form-group">
    //     <label for="email">E-mail: </label>
    //     <input type="email" name="user_email" placeholder="Enter Email">
    //     </div>
    //     <input type="submit" class="btn btn-primary" value="Register" />
    //  </form>';

    '<form method="post" action=""> 
            <div class= "SignHeader">
                <h2>SIGN UP</h2>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="username" type="text" class="form-control" name="user_name" placeholder="Enter Username">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="user_pass" placeholder="Enter Password">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="user_pass_check" placeholder="Retype Password">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="email" type="text" class="form-control" name="user_email" placeholder="Enter Email">
            </div>
        <p> <br> </p>
            <a href="#" class="btn btn-success btn-xs">
            <span class="glyphicon glyphicon-log-in"></span>
            <input class="btn btn-success" type="submit" value="Sign Up" /> </a>
        <p> <br> </p>
        </form> ';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
     
     
    if(isset($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . ($_POST['user_name']) . "',
                       '" . sha1($_POST['user_pass']) . "',
                       '" . ($_POST['user_email']) . "',
                        NOW(),
                        0)";
                         
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}
 
include 'footer.php';
?>
