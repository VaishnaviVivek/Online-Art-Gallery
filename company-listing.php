<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `Artists`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_company(company_id)
{
	if(confirm("Do you want to delete the company?"))
	{
		this.document.frm_company.company_id.value=company_id;
		this.document.frm_company.act.value="delete_company";
		this.document.frm_company.submit();
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
			<h4 class="heading colr">All Categories</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_company" action="lib/company.php" method="post">
				<div class="static">
				
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<div style="float:left; border:1px solid; margin:8px; padding:8px">
						<a href="product-listing.php?company_id=<?php echo $data[company_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[company_image]?>" style="height:180px; width:150px"></a><br>
						<div style="text-align:center; border-top:2px solid; padding: 5px 0px; font-weight:bold; font-size:14px;"><?=$data[company_name]?></div>
					</div>
					<?php } ?>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="company_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
