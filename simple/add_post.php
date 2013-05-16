<?php
include_once('resources/init.php');

if ( isset($_POST['title'], $_POST['contents'], $_POST['category'])){
    $errors = array();
    
    $title = trim($_POST['title']);
    $contents = trim($_POST['contents']);
    
    if (empty($title)){
        $errors[] = 'You need to add a title.';
    }else if (strlen($title) > 255) {
        $errors[] = 'The tile cannont be longer than 255 characters.';
    }
    
    if (empty($contents)){
        $errors[] = 'You need to add some text.';
    }
    
    if ( ! category_exists('id', $_POST['category'])){
        $errors[] = 'That category already exists.';
    }
    if ( empty($errors) ){
        add_post($title, $contents, $_POST['category']);
        
        $id = mysql_insert_id();
        
        header("Location: index.php?id={$id}");
        die();
    }
    
    
}//end if isset
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add a Post</title>
        
        <?php 
        if (isset($errors) && ! empty($errors)){
            echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
        }
        ?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style> 
        label { display : block;}
        </style>
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
        <h1>Add a Post</h1> 
        <form action="" method="post"> 
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php if ( isset($_POST['title'])) 
                                                                   echo $_POST['title'] ?>">
            </div>
            <div> 
                <label for="contents"> Contents </label>
                <textarea name="contents" rows="15" cols="50"><?php if ( isset($_POST['contents'])) 
                                                                   echo $_POST['contents'] ?></textarea> 
            
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
    </div><!--end content-->
        </div><!--wrapper-->
    </body>
</html>
