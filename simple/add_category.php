<?php
include_once('resources/init.php');

if( isset($_POST['name'])){
    $name = trim($_POST['name']);


    if(empty($name)){
        $error ='You must select a category name';
    }else if(category_exists('name', $name)){
        $error = 'That category already exist.';
    }else if(strlen($name) > 24){
        $error = 'Category names can only be up to 24 characters';
    }
    
    if ( ! isset($error)){
        add_category($name);
        
        header('Location: add_post.php');
        die();
    }
}//end if isset

?>
<!DOCTYPE html> 
<html lang ="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css"> 
        <meta charset ="utf-8">
        <meta http-equiv ="X-UA-compatible" content="IE=edge,chrome=1">
        <title>Add category</title>        
    </head>
    
    <body>
        <div id="wrapper">
        <div id="navbar">
        <nav> 
            <ul>
                <li><a href="index.php"> Index </a>-</li>
                <li><a href="add_post.php"> Add a Post </a>-</li>
                <li><a href="add_category.php"> Add a category </a>-</li>
                <li><a href="category_list.php"> Category list</a></li>
            </ul>
        </nav>
    </div><!--end navbar-->
    <div id="content">
        <h1>Add category</h1>

        <?php 
        if (isset($error) ){
            echo "<p> {$error} </p>\n";
        }

        ?>

        
        <form action ="" method ="post">
            <div>
                <label for="name">Name</label>
                <input type ="text" name="name" value="">
            </div>
            <div>
                <input type ="submit" value="Add category">
            </div>
        </form>
    </div><!--end content-->
    </div><!--end wrapper-->
    </body>
    </html>