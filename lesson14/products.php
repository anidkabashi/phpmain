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
			
		}
	}
?>