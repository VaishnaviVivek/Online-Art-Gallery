<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[order_id])
	{
		$SQL="SELECT * FROM `user`,`order` WHERE user_id = order_user_id AND order_id = ".$_REQUEST[order_id];
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<style>
th {
	height:30px;
	background-color:#666666;
	color:#FFFFFF;
}
</style>
 <div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="static">
				<h4 class="heading colr">Order Confirmation</h4>
			  <div class="form-group" style="color:#000000; font-size:20px">
				  Dear <?=$data['user_name']?>,<br>
				  This is the confirmation of the your order #<?=$data['order_id']?> has been successfully placed on date <?=$data['order_date']?>.<br><br>
			  </div>
			  <table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
							<th>Sr. No.</th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Cost</th>
							<th>Quantity</th>
							<th>Total</th>
					  </tr>
			  <?php
$SQL="SELECT * FROM `order_item`,`order`,`art` WHERE oi_product_id = product_id AND oi_order_id=order_id  AND oi_order_id = ".$_REQUEST['order_id'];					$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
						$sr_no=1;
						$total_cost=0;
						while($data = mysqli_fetch_assoc($rs))
						{
							$total_cost += $data[oi_total]*$data[oi_cart_quantity]; 
					  ?>
					   <tr>
								<th><?=$sr_no++?></th>
								<td><a href="product-details.php?product_id=<?php echo $data[product_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[product_image]?>" style="height:50px; width:50px"></a></td>
								<td><?=$data[product_name]?></td>
								<td><?=$data[oi_price_per_unit]?></td>
								<td><?=$data[oi_cart_quantity]?></td>
								<td id="total_item_cost<?=$sr_no?>"><?=$data[oi_total]*$data[oi_cart_quantity]?></td>
							<!-- echo product stock and quantity -->
							<?php
								echo "Qty: ".$quantity = $data['oi_cart_quantity'];
								echo "<br>";
								echo "Stock: ".$data['product_stock'];
							?>
					  </tr>
					  <?php  
						// update stock to db

						$stock = $data['product_stock'];
						$rem = $data['oi_cart_quantity'];
						$remaining_stock = $stock - $rem;
						echo "Remaining stock is: ".$remaining_stock;
						echo "Product_id: ".$data[product_id];

						if ($data['product_id']) {
							$statement = "UPDATE `art` SET `product_stock` = $remaining_stock";
							$cond = " WHERE `product_id` = $data[product_id]";
							$condQuery = "";
						}
						
						$sql1= $statement."".$cond;

        				$rs1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
					 ?>
					  <?php } ?>
					  <tr>
						<td colspan="6" style="text-align:right; font-weight:bold; font-size:18px;"> Total Cost : <span id="total_cost"><?=$total_cost?>.00/-</span></td>
					  </tr>
				   </tbody>
				</table>
			</form>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 