<?php
include_once('resources/init.php');

$post = get_posts($_GET['id']);

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
        edit_post($_GET['id'], $title, $contents, $_POST['category']);
        
        header("Location: index.php?id={$post[0]['post_id']}");
        die();
    }
    
    
}//end if isset
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>My blog</title>
      
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style> 
            label {display: block}
        </style>
        <title>Edit post</title>
    </head>
    <body>        
        <h1>Edit post<h1>
                
                <?php 
        if (isset($errors) && ! empty($errors)){
            echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
        }
        ?>
                
                <form action ="" method="post">
                    <div>
                        <label for="title"> Title</label>
                        <input type="text" name="title" value="<?php echo $post[0]['title'];?>">                        
                    </div>
                    
                    <div>
                        <label for="contents"> Contents</label>
                        <textarea name="contents" rows="15" cols="50"><?php echo $post[0]['contents'];?></textarea>
                    </div>
                    
                    <div>
                        <label for="category"> Category </label>
                        <select name="category">
                            <?php 
                        foreach ( get_categories() as $category ){
                            $selected = ( $category['name'] == $post[0]['name'])? 'selected' : '' ;
                            ?>
                            <option value="<?php echo $category['id']; ?>">
                                           <?php echo $selected; ?>
                                           <?php echo $category['name']; ?>                            
                            </option>
                            <?php
                        }
                    ?>
                            
                        </select>
                    </div>
                    
                    <div>
                        <input type="submit" value="Edit post">
                    </div>
                </form>
              
    </body>
</html>

