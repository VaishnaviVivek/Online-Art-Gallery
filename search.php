<?php 
include_once("includes/header.php"); 
include_once("includes/db_connect.php"); 
global $SERVER_PATH;
?> 
	<div id="banner">
    	<div class="left">
        	<div class="anythingSlider">
        
          <div class="wrapper">
            <ul>
               <li><a href="#"><img src="./images/banner1.jpg" alt="" /></a></li>
               <li><a href="#"><img src="./images/banner1.jpg" alt="" /></a></li>
               <li><a href="#"><img src="./images/banner1.jpg" alt="" /></a></li>
            </ul>        
          </div>
          
        </div>
        </div>
    </div>
    <div class="clear"></div>
  <script type="text/javascript" src="./js/cont_slide.js"></script>
  <div id="content_sec">
     <div class="col1">
     <h1>Search Results...</h1>
 <div class="static">
      <?php
      $search_value=$_POST["search"];

        $SQL="SELECT * FROM `art` WHERE product_name like '%$search_value%' OR product_id like '%$search_value%' ";
        $rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
      ?>
      <?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<div style="float:left; border:1px solid; margin:8px; padding:8px">
						<a href="product-details.php?product_id=<?php echo $data[product_id] ?>">
            <img src="<?=$SERVER_PATH.'uploads/'.$data[product_image]?>" style="height:180px; width:150px"></a><br>
						<div style="text-align:center; border-top:2px solid; padding: 5px 0px; font-weight:bold; font-size:14px;">
            <?=$data[product_name]?></div>
					</div>
					<?php } ?>
			</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php include_once("includes/footer.php"); ?> 
