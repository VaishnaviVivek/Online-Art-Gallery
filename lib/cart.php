<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	

	if($_REQUEST[act]=="save_item")
	{
		save_item();
		exit;
	}
	if($_REQUEST[act]=="update_cart")
	{
       
		update_cart();

		
		exit;
	}
	if($_REQUEST[act]=="delete_cart")
	{
		delete_cart();
		exit;
	}
	###Code for save cart#####
	function save_item()
	{
		if(!$_SESSION['login']) {
			header("Location:../login.php?msg=Login to buy products");
			exit;
		}
		global $con;
		$R=$_REQUEST;
		if($_SESSION['order_id'] == "" || !isset($_SESSION[order_id])) {
			$R['order_date'] = date("d F,Y h:i:s A");
			$SQL = "INSERT INTO `order` (`order_user_id`, `order_date`, `order_amount`, `order_status`) VALUES ('".$_SESSION['user_details']['user_id']."', '$R[order_date]', '0', 'Pending')";
			$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
			$_SESSION['order_id'] = mysqli_insert_id($con);	
		}
		/////////////////////////////////////
		if($R[cart_id])
		{
			$statement = "UPDATE `cart` SET";
			$cond = "WHERE `cart_id` = '$R[cart_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
			$statement = "INSERT INTO `order_item` SET";
			$cond = "";
			$msg="Item Added to Cart Successfully.";
		}
		$SQL=   $statement." 
				`oi_order_id` = '".$_SESSION['order_id']."', 
				`oi_product_id` = '$R[product_id]', 
				`oi_price_per_unit` = '$R[cost]', 
				`oi_cart_quantity` = '1',
				`oi_total` = '$R[cost]'
				". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		
		header("Location:../report-cart.php?msg=$msg");
	}
	###### Update the cart 
	function update_cart() {

       
		global $con;
		$R = $_REQUEST;
	
	// 	$cost=$_POST['total_cost_final'];
	// 	$id=$_POST['ids'];
		

	// $sql = "UPDATE order_item SET oi_total='$cost' WHERE oi_order_id='$id'"; 
    //   if(mysqli_query($con, $sql)){ 
    //    echo "Record was updated successfully."; 
	// } 
	// else 
	// { 
    // echo "ERROR: Could not able to execute $sql. "  
    //                         . mysqli_error($con); 
    //  }  


		$SQL="SELECT * FROM `order_item`,`art` WHERE oi_product_id = product_id AND oi_order_id = ".$_SESSION['order_id'];
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		$i = 0;
		while($data = mysqli_fetch_assoc($rs))
		{
			$SQL = "UPDATE order_item SET oi_cart_quantity = ".$R[order_quantity][$i]." WHERE oi_id = ".$data['oi_id'];
			$rs1 = mysqli_query($con,$SQL) or die(mysqli_error($con));
			$i++;
		}
		$order_id = $_SESSION['order_id'];
		$_SESSION['order_id'] = '';
		/// Update Order ////
		$SQL = "UPDATE `order` SET order_amount = ".$R['total_cost_final'].", order_status = 'Confirmed' WHERE order_id = ".$order_id;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../payment.php?order_id=$order_id");

	}
	
	#########Function for delete cart##########3
	function delete_cart()
	{
		global $con;
		$SQL="DELETE FROM order_item WHERE oi_id = $_REQUEST[oi_id]";
		$rs=mysqli_query($con,$SQL);
		header("Location:../report-cart.php?msg=Item Deleted Successfully.");
	}

?>
