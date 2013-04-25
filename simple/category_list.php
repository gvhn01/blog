<?php
	include_once('resources/init.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Category list</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
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
        
    </body>
</html>
