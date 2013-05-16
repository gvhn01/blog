<?php
	include_once('resources/init.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Category list</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
            <h1>Delete category</h1>
            <p>Click on the category you want to delete. The category will be deleted instantly.</p>
    	<?php 
    	foreach (get_categories() as $category) {
    		?>
    		<p><a href="category.php?id=<?php echo $category['id']; ?>">
                    <?php echo $category['name'];?></a>	- <a href="delete_category.php?id=
                    <?php echo $category['id']; ?>">Delete</a> 
    		</p>

    		<?php
    	}
    	?>
        <div><!--end content-->
        </div><!--end wrapper-->
    </body>
</html>
