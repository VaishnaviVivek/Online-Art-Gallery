<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `order_item`,`art` WHERE oi_product_id = product_id AND oi_order_id = ".$_SESSION['order_id'];
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>

<script>
function delete_record(category_id) {
	this.document.frm.act.value="delete_category";
	this.document.frm.submit();
}
function calculateCost(obj, sr_no, price) {
	var final_cost = obj.value * price;
	$('#total_item_cost'+sr_no).html(final_cost);
	calculate_total();
}
function calculate_total() {
	var total_record = $('#records').val();
	var total_cost = 0;
	for(i=2;i <= total_record; i++ ) {
		total_cost += parseInt($('#total_item_cost'+i).html());
	}
	$('#total_cost').html(total_cost+".00/-");
	$('#total_cost_final').val(total_cost);
}
</script>
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
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Cart Items</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_category" action="lib/cart.php" method="post">
				<div class="static">
				<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
							<th>Sr. No.</th>
							<th>Image</th>
							<th>Product Name</th>
							<th>Cost</th>
							<th>Stocks</th>
							<th>Qty <?php echo "Check Stock!"?></th>
							<th>Total</th>
							<th><i class="icon_cogs"></i> Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						$total_cost=0;
						while($data = mysqli_fetch_assoc($rs))
						{
							$total_cost += $data[oi_total]; 
					  ?>
					  <tr>
								<th><?=$sr_no++?></th>
								<td><a href="product-details.php?product_id=<?php echo $data[product_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[product_image]?>" style="height:50px; width:50px"></a></td>
								<td><?=$data[product_name]?></td>
								<td><?=$data[oi_price_per_unit]?></td>
								<td><?=$data[product_stock]?></td>
								<td style="text-align:center">
								
								<input type="text" value="<?=$data[oi_cart_quantity]?>" name="order_quantity[]" style="text-align:center; font-weight:bold;" onChange="calculateCost(this,<?=$sr_no?>,<?=$data[oi_price_per_unit]?>)">
								</td>
								<td id="total_item_cost<?=$sr_no?>"><?=$data[oi_total]?></td>
								<td style="text-align:center">
								<div class="btn-group">
								<a style="color:#FF0000; text-decoration:underline; font-weight: bold; " href="lib/cart.php?act=delete_cart&oi_id=<?=$data[oi_id]?>">Delete</a>
								</div>
								</td>
					  </tr>
					  <?php } ?>
					  <tr>
						<th colspan="7" style="text-align:right; font-weight:bold; font-size:18px;"> Total Cost : <span id="total_cost"><?=$total_cost?>.00/-</span>&nbsp;&nbsp;&nbsp;</th>
					
						<?php

$_SESSION["totalcost"] = $total_cost;
					  ?>
					  </tr>
					 
						</tbody>
				</table>
				<!-- test -->
		
				<!-- check for stock and prevent payment -->
				<!-- SQL art and get stock info -->
			  <div style="margin:10px; text-align:right;"><input type="submit"  value="Place Order" style="width:200px; margin-top:10px" class="button-link"></div>
			  <input type="hidden" name="total_cost_final" id="total_cost_final" value="<?=$total_cost?>">
			  <input type="hidden" name="act" value="update_cart"/>
			  <?php
				$id=$_SESSION['order_id'];
		         ?>

			  <input type="hidden" value="<?=$id?>" name="ids" >
          

			  <input type="hidden" id="records" value="<?=$sr_no?>" />
			 </form>
		  </div>
	  </div>
	</div>
	</div>


    <!--footer start-->
		<?php include_once("includes/footer.php"); ?>
