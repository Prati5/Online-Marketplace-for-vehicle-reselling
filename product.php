<?php 
// This file is www.developphp.com curriculum material
// Written by Adam Khoury January 01, 2011
// http://www.youtube.com/view_play_list?p=442E340A42191003
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
$connect = mysqli_connect("localhost", "root", "", "sdproject");  
?>
<?php 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
  // Connect to the MySQLi database  
   $connect = mysqli_connect("localhost", "root", "", "sdproject");  
    //include "dbcontroller.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$sql = "SELECT * FROM product_details WHERE id='$id' LIMIT 1";
//	$productCount = mysqli_num_rows($sql); // count the output amount
    $result = mysqli_query($connect, $sql);  
		// get all the product details
		while($row = mysqli_fetch_array($result)){ 
       $id = $row['id'];
			 $product_name = $row["pname"];
			 $price = $row["price"];
			 $milage = $row["milage"];
       $r_status = $row["r_status"];
       $email=$row["email"];
       $mobile=$row["Mobile"];
         }
		 
	//  else {
	// 	echo "That item does not exist. id is not coming" .$id;
	//     exit();
	// }
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
mysqli_close($connect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product_name; ?></title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<script type="text/javascript">
			function showMessage(val){
				alert("Please Call this number  "+val);
			}
    </script>
  <style>
      .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

.button2 {background-color: #008CBA;} 
  </style>
</head>
<body>
<div align="center" id="mainWrapper">
  <!-- <?php include_once("template_header.php");?> -->
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="19%" valign="top"><img src="img/bg-img/<?php echo $id; ?>.jpg" width="142" height="188" alt="<?php echo $product_name; ?>" /><br />
      <a href="img/bg-img/<?php echo $id; ?>.jpg">View Full Size Image</a></td>
      <!-- <img src="data:image/jpeg;base64,'.base64_encode($row['id'] ).'" height="300" width="700" class="img-thumnail" />   -->
    <td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
      <p><?php echo "$".$price; ?><br />
        <br />
        Milage : <?php echo "$milage ". " km/hr"; ?> <br />
         <p><?php echo "Running status :"."$r_status". " km"; ?> <br />

        <?php echo "email :". "$email"; ?> <br />
<br />
       
<br />
        </p>
      <form id="form1" name="form1" method="post" action="">
        <button class="button" value="<?php $mobile; echo $mobile; ?>"onClick='showMessage(this.value)'> <i class="fa fa-phone" aria-hidden="true"></i>Call Now to Buy </button> 
      </form>
      </td>
    </tr>
</table>
  </div>
</div>
<a href="index.php"> <button class="button button2">Go back to Home Page </button></a>
</body>
</html>