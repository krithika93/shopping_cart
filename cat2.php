<?php  session_start();
include('common/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Display Items </title>

</head>

<link rel="stylesheet" type="text/css" href="style1.css">
 
</head>

<body bgcolor="#f2f1d9" style="padding:0px 0px 0px 0px; margin:auto;">
<div id="wrapper" style="margin:auto;width:1000px;">
<div id="nav1" style="width:100%;	height:100px;	position:fixed;	top:0px;	left:0px;margin:0px;	padding:0px;	background-color:#514E42;
	width:100%;
	background:url(file:///C|/image/header_footer-d1f4ead3.png) repeat-x scroll 0 -272px #005575;
	height:90px;
	z-index:3000;
	margin:0 auto;
	padding:0;
	color:#ffffff;>
	<div id="one"  style="margin-top:0px; float:left; width:30px;">
     <p style="font-size:30px;">SHOP IT!</p></div>
<div id='menu'>
                        <ul>
								<li><a href="cat2.php">HOME</a></li>
                                <li><a id='products'>Products available</a> 
                                      <ul>
									  <li><a href="#">Bag</a></li>
									  
									  </ul>
								</li>	  
                        	
                                <li><a id='categories'>Categories</a>
									<ul>
									<li><a href="#">Apparels</a></li>
									</ul>		
									
								</li>
																				
                               <li><a>WishList</a></li>
                               <li><a>Bargains</a></li>
                       </ul>
 </div>

</div>

<div id="container" style="width:620px; margin-left:200px; margin-bottom:100px; margin-right:100px; margin-top:100px; background-color:#663399;" > 

<h3 style="background-color:#FF0">Products</h3>
<a style="color:#FFFF00; text-decoration:none" href="cart.php?action=none" ><span style="margin-left:500px;">
<img src="images/cart.png">Cart <p style="font-size:14px;">You have currently (<?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); } else if(isset($_SESSION['pro'])) {  echo count($_SESSION['pro']); } else { echo "0"; }  ?>) in your cart </p></span></a>
</br>
<div id="top"  style="width:100%; height:150px; position:relative;">
<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;">
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php?id=$count&action=none"; } else { echo "merpage.php?id=$count&action=none"; } }?>" ><?php if(isset($_SESSION['loggedin'])){ $gg=$_SESSION['name']; echo $gg; } else { echo "Guest"; } ?> </a> 
</div>
<span  style="padding: 2px 2px; float:left; background-color:#990099;">											
                  <?php if(isset($_SESSION['loggedin']))
				  {?>
							  <a href="logout.php">Logout</a> &nbsp; &nbsp;
				 <?php } ?>
				 <?php if(empty($_SESSION['loggedin']))
				 { ?>		  
							  <a href="index1.php"> Login</a> &nbsp; &nbsp;
							  <a href="register-1.php">Register</a>&nbsp; &nbsp;
				<?php } ?>			  
  </span>
</div>
<div id='menu1'>
	<table align="right" style="float:right;">
		<?php if(isset($_SESSION['sell']))
		{ ?>
			<tr>
			  <th width="112"><a id='seller'>SELLER</a></th> >>
			  <td width="71"><a href='merr.php?action=none'>Add an Item</a></td> |
			  <td width="114"><a href='merr.php?action=none'>Modify the cart</a></td> |
			  <td width="83"><a href="#">Updade your profile</a></td> |
			  <td width="43"><a href='table2.php?action=none'>Products Page</a></td> |
			  <td width="85"><a href='merpage.php?action=none'>Home Page</a></td> 
			</tr> <br />
			<?php } ?>
			<?php if(isset($_SESSION['cust']))
			{ ?>
			
			<tr><th><a id='customer'>CUSTOMER</a> </th>  >>
			
				<td><a href='tt.php?action=none'> Home Page</a></td> |
				<td><a href='cart.php?action=none'>Your Cart</a></td> |
				<td><a href='cart.php?action=none'>Add new item</a></td> |
				<td><a href='table2.php?action=none'>Products page</a></td> | 
				<td width="66"><a href="#">Update Profile</a></td>
						
				
			</tr>  <br />
		<?php } ?>
			
	</table>
 </div>
<!-- <div id="range">
same name not for two ids
</div> -->



<div id="category">
<div id="cat">
<form action="" method="post" name="myform">


<select name="skills" onChange="this.form.submit();" >
		<option value="Categories" selected="selected">Categories</option>
		<option value="studies">Studies</option>
		<option value="electronic">Electronic</option>
		<option value="apparels">Apparels</option>
		
</select>
</form>

</div>



<?php
if((!isset($_POST['skills']))&&(!isset($_POST['check1']))&&(!isset($_SESSION['skills'])))
{ 
 $array=array("100-200","200-300","300-400","400-500"); ?>

	
<?php
echo "<br><hr><h3>Refine</h3><table><tr>";
foreach($array as $a)
{
 echo "<input type=checkbox value=readonly />$a</tr><tr>";
 }
 echo "</table>";
 echo "<br><hr>";
 echo "<h3>Brand</h3><table><tr>";
 $bb=array("XX","YY","ZZ","AA");
foreach($bb as $a)
{
 echo "<input type=checkbox value=readonly />$a</tr><tr>";
 }
 echo "</table><hr>";
 }
 
?>

<?php if(isset($_POST['skills'])) {  
$skills=$_POST['skills']; ?>
<div id="cat2">

		<h2>Brand</h2>
<form action="" method="post">
		<?php $results=mysql_query("select * from products where cat='$skills'");
	
			$_SESSION['skill']=$skills;
			
			while($array=mysql_fetch_array($results))
			{
			$arr[]=$array['brand'];
			}
			$brand1=array("XX","YY","ZZ","AA");
			$hello=array_diff($brand1,$arr); 
			?>
			
			<table>
			<?php 
			foreach($brand1 as $jj)
				{ ?> 
				<tr>
				<?php 
				
				if(in_array($jj,$hello))
				{
				echo "<input type='checkbox' readonly='true' /><del>$jj</del></tr><tr>";
				}
			
				else
				{
				echo "<input type='checkbox' name='check1[]' value=$jj onchange=this.form.submit(); /><ins>$jj</ins></tr>";
				}		
				
				}
		
			?>
			</table>
			</form>
</div>		
<?php } ?>
<?php if(isset($_POST['check1'])) 
{  ?>
<div id="cat3">
		<h3>Refine </h3>
<?php 
$ran=array("100-200","200-300","300-400","400-500");
//$var must be static 
function range1($var)
{
if(($var >= 100)&&($var < 200))
{
	return true;

}
}
function range2($var)
{
if(($var >= 200)&&($var < 300))
{
	return true;

}
}

function range3($var)
{
if(($var >= 300)&&($var < 400))
{
	return true;

}
}
function range4($var)
{
if(($var >= 400)&&($var <= 500))
{
	return true;

}
}
if(isset($_POST['check1']))
{
$brand=$_POST['check1'];
$skills=$_SESSION['skill'];
$brand=$brand[0];
$_SESSION['brand']=$brand;


			$results=mysql_query("select * from products WHERE cat ='$skills' AND  brand ='$brand'");
			if((mysql_num_rows($results)) == 0)
			{
				echo "good";
			}
			
			while($arr=mysql_fetch_array($results))
			{
			$ar[]=$arr['price'];
			
			}
			
			$red=$ar;			
			?>
			<form action="" method="post">
			<?php
			$ss="range";
			$s1="1";
			$count=parseInt($s1)
			if((count(array_filter($ar,"range1")))!=0)
			{	
			$one=array_intersect($red,$ar);
			$varr=$one[0];
			echo $varr;
			 echo "<table><tr><input type='checkbox' name='check2[]' value=$varr onchange=this.form.submit(); /><ins>100-200</ins></tr>";
			 }
			 else
			 {
				echo  "<input type='checkbox' readonly='true' /><del>100-200</del></tr><tr>";
			 }
			 $ar=$red;
			if((count(array_filter($ar,"range2")))!=0)
			{	$array=array_filter($ar,"range2");
				$one=array_intersect($red,$array);
				$varr=$one[0]; echo $one[1];
				echo $varr;
			 echo "<input type='checkbox' name='check2[]' value=$varr onchange=this.form.submit(); /><ins>200-300</ins></tr>";
			}
			 else
			{
				
				echo  "<input type='checkbox' readonly='true' /><del>200-300</del></tr><tr>";
			}
			$ar=$red;
			if((count(array_filter($ar,"range3")))!=0)
			{	
			$one=array_intersect($red,$ar);
			$varr=$one[0];
			echo  $varr;
			 echo "<input type='checkbox' name='check2[]' value=$varr onchange=this.form.submit(); /><ins>300-400</ins></tr>";
			}
			 
			 else
			 {
				echo  "<input type='checkbox' readonly='true' /><del>300-400</del></tr><tr>";
			}
			$ar=$red;
			if((count(array_filter($ar,"range4")))!=0)
			{				
			$one=array_intersect($red,$ar);
			$varr=$one[0];
			
			 echo "<input type='checkbox' name='check2[]' value=$varr onchange=this.form.submit(); /><ins>400-500</ins></tr>";
			 }
			 else
			 {
				echo  "<tr><input type='checkbox' readonly='true' /><del>400-500</tr>";
			}
		
			 
			 
				?>
				</table>
				</form>
		
		
			</div>
			
		
<?php } } ?>
</div> 
<div id="range">
<form action="" method="post">


<select name="ski" onChange="this.form.submit();" >
		<option value="Orderby" selected="selected">Order By</option>
		<option value="pop">Popularity</option>
		<option value="asc">Price Range Ascending</option>
		<option value="des">Price Range Descending</option>
		<option value="brand">Brand Ascending</option>
			
</select>
</form>
</div>
<div id="prod"> 

<?php include('common/db.php'); ?>
	<?php 
if(isset($_POST['ski']))
{
$sot=$_POST['ski'];
if($sot=="pop")
{
$results=mysql_query("select * from products ORDER BY qtyre ASC");
}
if($sot=="asc")
{
$results=mysql_query("select * from products ORDER BY price ASC");
}
if($sot=="des")
{
$results=mysql_query("select * from products ORDER BY price DESC");
}
if($sot=="brand")
{
$results=mysql_query("select * from products ORDER BY brand ASC");
}


} 
?>
<?php if(!(isset($_POST['skills'])) && !(isset($_POST['ski'])) && !(isset($_POST['check1'])) && !(isset($_POST['check2']))) 
 {
 $items=mysql_query("select * from products"); ?>
 <table border="0" cellpadding="10" id="tab" align="center">
 <?php 
 while($result=mysql_fetch_array($items))
{ ?>
<form action="#" method='post'>



<td id="div11"> <img id="div1" src="<?php echo $result['picture']; ?>" /> </td> 
<td id="div11"><b><?php  echo $result['name']?></b><br>
      <b><?php echo $result['description']?></b><br>
      <b><big style="color:#000000">
       $<?php echo $result['price']?></big></b></td> 

	  
		<?php if($result['stock']==0){ echo "<big style='#999999'><b>Out of Stock</b></big>"; } ?>
   <?php if($result['stock']!=0) { ?>  <tr><td></td><td>  <a  href="<cart.php?id=<?php echo $result['serial'];?>&action=add "> <input type="button" name="b1"  value="ADD" /></a></td></tr> <?php } ?>


<tr><td colspan="2"><hr size="1" /></td></tr>
<?php }
 

    echo "<span width='579px'>*Please fill all the quanities</span>";

 
?>

</table>

  <input type='submit' name='formSubmit' value='Submit' id='sub' />
</form>
  
  

<?php 
}


?>
	 
	 <?php if((isset($_POST['skills'])) || (isset($_SESSION['skills'])) || (isset($_SESSION['brand'])) || (isset($_POST['check2'])) )
 {
 

 ?>
	 
	 
	

<?php
	if(isset($_POST['skills']))
	{
	$skills=$_POST['skills'];
	$chec=1;
	$results=mysql_query("select * from products WHERE cat ='$skills'");
	}
	
		
	if(isset($_POST['check1']))
	{
	$skills=$_SESSION['skill'];
	$brandy=$_POST['check1'];	
	$brandy=$brandy[0];
	$results=mysql_query("select * from products WHERE cat='$skills' AND brand ='$brandy'");
	}
	

	
	if(isset($_POST['check2']))
	{
	
	
	$skills=$_SESSION['skill'];
	
	$brandy=$_SESSION['brand'];
	
		$var2=$_POST['check2'];
		$var2=$var2[0];
		
		switch($var2)
		{
		
		case(($var2 >= 100)&&($var2 < 200)):
	  {
		echo "1";
		 $results=mysql_query("select * from  products WHERE ((price >= 100)  AND (price < 200)) AND cat='$skills' AND brand='$brandy'");
		 
		 break;
		 }
		 
		
		 case(($var2 >= 200)&&($var2 < 300)):
		 {
			echo "2";
		$results=mysql_query("select * from products WHERE cat='$skills' AND brand='$brandy' AND ((price >= 200) AND (price < 300))");
		
		
		 break;
		 }
		 
		case(($var2 >= 300)&&($var2 < 400)):
	   {
			echo "3";
		 $results=mysql_query("select * from products WHERE cat='$skills' AND brand='$brandy' AND ((price >= 300) AND (price < 400))");
		 
		 
		 break;
		 }
		 
		case(($var2 >= 400)&&($var2 <= 500)):
	   {
			echo "4";
		 $results=mysql_query("select * from products WHERE cat='$skills' AND brand='$brandy' AND ((price >= 400)  AND (price <= 500))");
				
			break;
		
	}
	
	};
	
}


}

	?>

	

	
	
	
	<?php 
	
	if(isset($results))
	{
	if((mysql_num_rows($results)) != 0)
	{
	//echo mysql_num_rows($results);
		$count=0; 
	 echo "<table border='1' cellpadding='10'  bgcolor='#663399' id='tab'><tr>";
	while($array=mysql_fetch_array($results)) 
	{
	
	?>
	<?php 
	if(($count>0) and (($count%2)==0))
	{
	echo "</tr><tr>";
	}  ?>
	<td id="div11"><img id='div11' src='<?php echo $array['picture']; ?>' /> </td>
	<td id="div11"><?php echo $array['name']; echo "<br>";
	echo " ".$array['description']; echo "<br>";
	echo " ".$array['price']; echo "<br>";
	?>
</td> 
<?php	 
$count=$count+1; 
}
//echo '</tr>';
?>

</table>
<?php }
else
{
	echo "No products found";
	}
	}
 $chec=0;
$chec1=0;
?>



 </div>

<style>


</style>
</div>
</div>
</body>
</html>






        
