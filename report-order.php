<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `order` WHERE order_user_id = ".$_SESSION['user_details']['user_id'];
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_order(order_id)
{
	if(confirm("Do you want to delete the order?"))
	{
		this.document.frm_order.order_id.value=order_id;
		this.document.frm_order.act.value="delete_order";
		this.document.frm_order.submit();
	}
}
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Your All Order History</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_order" action="lib/order.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover" id="mydatatable" style="color:#000000; width:100%" width="100%">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Date</td>
						<td scope="col">Total Amount</td>
						<td scope="col">Order Status</td>	
						<td scope="col">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[order_id]?></td>
						<td><?=$data[order_date]?></td>
						<td><?=$data[order_amount]?></td>
						<td><?=$data[order_status]?></td>
						<td style="text-align:center">
							<a style="color:#FF0000; font-weight:bold; text-decoration:underline" href="order-confirmation.php?order_id=<?php echo $data[order_id] ?>">View Details</a>
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="order_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
