<?php
include_once('resources/init.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add a Post</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style> 
        label { display : block;}
        </style>
    </head>
    <body>
        <h1>Add a Post</h1> 
        <form action="" method="post"> 
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="">
            </div>
            <div> 
                <label for="contents"> Contents </label>
                <textarea name="contents" rows="15" cols="50"></textarea> 
            
            </div>
            <div> 
                <label for="category"> Category </label>
                <select name="category">
                    <?php 
                        foreach ( get_categories() as $category ){
                            ?>
                            <option value="<?php echo $category['id']; ?>"> 
                                           <?php echo $category['name']; ?>                            
                            </option>
                            <?php
                        }
                    ?>
                    
                </select>            
            </div>
            <div>
                <input type="submit" value="Add Post">
            </div>
        </form>
        
    </body>
</html>
