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
    }
}//end if isset

?>
<!DOCTYPE html> 
<html lang ="en">
    <head> 
        <meta charset ="utf-8">
        <meta http-equiv ="X-UA-compatible" content="IE=edge,chrome=1"
        <title>Add a category</title>        
    </head>
    
    <body>
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
    </body>
    </html>