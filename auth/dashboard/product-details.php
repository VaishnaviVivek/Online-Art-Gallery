<?php
    // Restrict URl ACCESS
    session_start();
    if(!isset($_SESSION['auth_name'])) {
        header("Location: /online_art_gallery/auth/index.php?AcessDenied!");
    }
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/online_art_gallery/auth/dashboard/css/style.css">
<div class="navbar">
	<a class="active" href="/online_art_gallery/auth/dashboard/index.php"><i class="fa fa-fw fa-home"></i> Online Art Gallery</a>
	<a href="/online_art_gallery/auth/includes/auth.logout.php" class="login-name" style="float: right;"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
	<a href="#" style="float: right";><i class="fa fa-fw fa-user"></i> <?php echo strtoupper($_SESSION['auth_name']);?></a>
</div>

<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/style.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/slider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="/online_art_gallery/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/validation.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/animatedcollapse.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/contentslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddaccordion.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/acrodin.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/lightbox.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu-collapsed.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon-yui.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.validate.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery-ui.js"></script>
<link href='/online_art_gallery/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="/online_art_gallery/js/jquery.dataTables.min.js"></script>

<div><br>
</div>

<?php 
	// include_once("../includes/header.php");

    include ("/var/www/html/online_art_gallery/auth/access/access_art.php");

        $con = mysqli_connect($server, $user, $pass, $db);
        unset($server, $user, $pass, $db);
	if($_REQUEST[product_id])
	{
		$SQL="SELECT * FROM `art`, `Artists`, `type` WHERE product_type_id = type_id AND product_company_id = company_id AND product_id = ".$_REQUEST[product_id];
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}

	$SQL="SELECT * FROM `art`, `Artists`, `type` WHERE product_type_id = type_id AND product_company_id = company_id AND type_id = ".$data[type_id];
	$product_rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?> 
<script>
function goToPage(product_id, product_cost)
{
	location.href = "lib/cart.php?act=save_item&product_id="+product_id+"&cost="+product_cost;
}
</script>
	<!-- <div class="crumb">
    </div>
    <div class="clear"></div> -->
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$data[product_name]?> Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div id="myrow">
				<form action="/online_art_gallery/auth/dashboard/lib/product.php" enctype="multipart/form-data" method="post" name="prod_form">
				
				<table>
					<tr>
					<ul class="forms">
							<th><li class="txt">Art ID</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="product_id" type="text" class="bar" required value="<?=$data[product_id]?>" readonly="readonly"/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Art Name *</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="product_name" type="text" class="bar" required value="<?=$data[product_name]?>"/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Artist Name</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="artist_name" type="text" class="bar" required value="<?=$data[artist_name]?>" disabled/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Artist Id</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="artist_id" type="text" class="bar" required value="<?=$data[artist_id]?>" disabled/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Artist Description</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="artist_desc" type="text" class="bar" required value="<?=$data[artist_desc]?>" disabled/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Art Type</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="type_name" type="text" class="bar" required value="<?=$data[type_name]?>" disabled/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Art Category</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="company_name" type="text" class="bar" required value="<?=$data[company_name]?>" disabled/></li></td>
					</ul>
					</tr>
					<tr>
					<ul class="forms">
							<th>
							<li class="txt">Art Price ₹</li></th>
							<td><li class="inputfield" style="list-style-type: none;"><input name="product_price" type="text" class="bar" required value="<?=$data[product_price]?>"/></li></td>
					</ul>
					</tr>
					<tr>
						<ul class="forms">
								<th>
								<li class="txt">Art Description *</li></th>
								<td><li class="inputfield" style="list-style-type: none;"><input name="product_description" type="text" class="bar" required value="<?=$data[product_description]?>"/></li></td>
						</ul>
					</tr>
					<tr>
						<ul class="forms">
								<th>
								<li class="txt">Stock *</li></th>
								<td><li class="inputfield" style="list-style-type: none;"><input name="product_stock" type="text" class="bar" required value="<?=$data[product_stock]?>"/></li></td>
						</ul>
					</tr>
					</table>
					<ul class="forms" style="float: right; padding: 8px 0px 5px 0px">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Update" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>

					<!-- Prod update -->
					<input type="hidden" name="act" value="update_product">
					</form>
			</div><br><br>
			
			<h4 class="heading colr">All Related Arts</h4>
			<div class="static">
			<table>
					<?php 
					$sr_no=1;
					while($product_data = mysqli_fetch_assoc($product_rs))
					{
					?>
					<tr>
						<td><a href="product-details.php?product_id=<?php echo $product_data[product_id] ?>"><img src="<?=$SERVER_PATH.'/online_art_gallery/uploads/'.$product_data[product_image]?>" style="height:170px; width:150px"></a></td>
						<td style="vertical-align:top">
						<table border="0">
								<tr>
									<td class="tdheading">Art ID</th>
									<td><?=$product_data[product_id]?></td>
								</tr>
								<tr>
									<td class="tdheading">Art Name</th>
									<td><?=$product_data[product_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Art Type</th>
									<td><?=$product_data[type_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Category</th>
									<td><?=$product_data[company_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Price</th>
									<td><?=$product_data[product_price]?></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center; padding:12px;">
										<a href="product-details.php?product_id=<?php echo $product_data[product_id] ?>" class="button-link">View Details</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Art <?=$data['product_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'/online_art_gallery/uploads/'.$data[product_image]?>" style="width: 250px"></div><br>
		</div>
	</div>


	<!-- if ($stock <= "0") {
							echo "Out of Stock";
						}
						else {
							echo '<a href="#"  onClick="goToPage(<?=$data[product_id]?>,<?=$data[product_price]?>)" class="button-link">Add to Cart</a>';
						} -->