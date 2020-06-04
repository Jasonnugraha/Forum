
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Game Forum</title>
    <script   src="https://code.jquery.com/jquery-3.5.1.js"   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="   crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<h1>Game Forum</h1>
    <div class="container">
        <div id="wrapper">
          <!-- <div id="menu"> -->
            <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-darkt bg-dark">
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>  
                </button>
                 
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg0">
                        <!-- Navbar content -->
                       <div class="container">
                        <a href="index.php" id="Title">Game Forum</a>

                            <div class="row">
                                <div class="col">
                                    <li class="navbar navbar-nav active">
                                        <a class="nav-link" href="create_topic.php">Create a topic</a> 
                                    </li>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <li class="navbar navbar-nav active">
                                    <a class="nav-link" href="create_cat.php">Create a category</a>
                                    </li>
                                </div>
                            </div>
                        </div>


                    <?php
                    echo'<div id="userbar">';
                    
                    if(isset($_SESSION['signed_in']))
                    {
                        echo '<div class= "acc"> Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a></div>';
                    }
                    else
                    {
                        echo ' <div class= "nav-link">
                        <a href="signin.php" class="btn btn-primary btn-xs">
                            <span class="glyphicon glyphicon-user"></span>
                            <input class="btn btn-primary" type="submit" value="Sign In" /> 
                        </a>
                        <a href="signup.php" class="btn btn-success btn-xs">
                            <input class="btn btn-success" type="submit" value="Sign Up" /> 
                        </a>
                        </div>';
                    }
                    echo'</div>'; 
                    ?>
                     
                    </ul>
                </div>
                    

            </nav>
    <!-- </div> -->
<div id="content">