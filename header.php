
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Game Forum</title>
    <script   src="https://code.jquery.com/jquery-3.5.1.js"   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="   crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<h1>Game Forum</h1>
    <div id="wrapper">
    <!-- <div id="menu"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg0">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a> 
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="create_topic.php">Create a topic</a> 
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="create_cat.php">Create a category</a>
        </li>
        </ul>
        
    </div>
    </nav>
        
        <?php
            echo'<div id="userbar">';
            if(isset($_SESSION['signed_in']))
            {
                echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a>';
            }
            else
            {
                echo '<a href="signin.php">Sign in</a> or <a href="signup.php">create an account</a>.';
            }
            echo'</div>'; ?>

        </div>
        <div id="content">