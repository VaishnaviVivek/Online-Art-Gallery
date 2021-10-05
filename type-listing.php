<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `type`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_type(type_id)
{
	if(confirm("Do you want to delete the type?"))
	{
		this.document.frm_type.type_id.value=type_id;
		this.document.frm_type.act.value="delete_type";
		this.document.frm_type.submit();
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
			<h4 class="heading colr">All Type</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_type" action="lib/type.php" method="post">
				<div class="static">
				
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<div style="float:left; border:1px solid; margin:8px; padding:8px">
						<a href="product-listing.php?type_id=<?php echo $data[type_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[type_image]?>" style="height:180px; width:150px"></a><br>
						<div style="text-align:center; border-top:2px solid; padding: 5px 0px; font-weight:bold; font-size:14px;"><?=$data[type_name]?></div>
					</div>
					<?php } ?>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="type_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
