<?php 

	include_once('config.php');

	if(isset($_POST['submit']))
	{
		$title=$_POST['title'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];

		if(empty($title) || empty($description) || empty($quantity) || empty($price)) 
		{
			echo "You need to fill all the fields.";
		}
		else
		{
			$sql = "SELECT title FROM products WHERE title=;title";
			
			$tempSQl = $conn->perpare($sql);
			$tempSQl->bindPrama(':title', $title);
			$tempSQl->execute();

			if($tempSQl->rowCount() > 0)
			{
				echo "Title exists!";
				header( "refresh:2; url=addProducts.php");
			}
			else
			{
				$sql = "insert into products (title,description, quantity, price) values (:title, :description, :quantity, :price)";
				$insertSQL->bindPrama(':title', $title);
				$insertSQL->bindPrama(':description', $description);
				$insertSQL->bindPrama(':quantity', $quantity);
				$newprice=$price*100;
				$insertSQL->bindPrama(':price', $newprice);

				$insertSQL->execute();

				echo "Data saved successfully ...";
				header( "refresh:2; url=procutcDashboard.php");
			}
		}
	}
?>