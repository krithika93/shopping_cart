<?php  session_start();
include('common/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Display Items </title>

</head>

<style>
#menu
{
background-color:#00FF00;
float:left;
text-align:left;
width:100%;

}
ul 
{
float:left;
list-style-type:none;
}

</style>





  <style>

ul { font-family: Arial, Verdana; font-size: 14px; margin: 0; padding: 0; list-style: none; } ul li { display: block; position: relative; float: left; } li ul { display: none; } ul li a { display: block; text-decoration: none; color: #ffffff; border-top: 1px solid #ffffff; padding: 5px 15px 5px 15px; background: #1e7c9a; margin-left: 1px; white-space: nowrap; } ul li a:hover { background: #3b3b3b; } li:hover ul { display: block; position: absolute; } li:hover li { float: none; font-size: 11px; } li:hover a { background: #3b3b3b; } li:hover li a:hover { background: #1e7c9a; }

ul {
    font-family: Arial, Verdana;
    font-size: 14px;
    margin: 0;
    padding: 0;
    list-style: none;
	b
}
ul li {
    display: block;
    position: relative;
    float: left;
}
li ul {
    display: none;
}
ul li a {
    display: block;
    text-decoration: none;
    color: #ffffff;
    border-top: 1px solid #ffffff;
    padding: 5px 15px 5px 15px;
    background: #1e7c9a;
    margin-left: 1px;
    white-space: nowrap;
}
ul li a:hover {
background: #3b3b3b;
}
li:hover ul {
    display: block;
    position: absolute;
}
li:hover li {
    float: none;
    font-size: 11px;
}
li:hover a { background: #3b3b3b; }
li:hover li a:hover {
    background: #1e7c9a;
}
 h1 {
	background-color:#FF0000;
 left:-20px;
 }
#list
{
float:left;
}






#ch
{
margin-right:5px;
background-color:#CCFF66;

}

#fix
{
background-color:#66FF99;
text-align:right;
border-left:10;
float:left;
display:block;
height:50px;
width:50px;
}
#category
{
background-color:#99FF33;

	
	
}	

 </style>
 
</head>

<body>  
  
<div id="container" style="height:1950px; width:620px; margin-left:200px; margin-right:100px; margin-top:100px; background-color:#663399;" > 

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
                                <tr> <th width="112"><a id='seller'>SELLER</a></th> >>
                               
                                    
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
 

		
<div id='menu'>
                        <ul>
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

<div id="prod"> 

<?php include('common/db.php'); ?>
<?php if(!(isset($_POST['skills'])) && !(isset($_SESSION['skills'])) && !(isset($_POST['check1'])) && !(isset($_POST['check2']))) 
 {
 $items=mysql_query("select * from products");
 while($result=mysql_fetch_array($items))
{ ?>
<form action="#" method='post'>
<table border="1" cellpadding="10" id="tab">
<?php if(isset($_GET['count'])){$count=$_GET['count']; } ?>
<tr>
<td id="div11"> <img id="div1" src="<?php echo $result['picture']; ?>" /> </td> 
<td id="div11"><b><tr><td>Name:</td><td><?php  echo $result['name']?></td></tr></b><br />
       <tr><td>Description:</td><td><?php echo $result['description']?></td></tr><br />
       <tr><td>Price:</td><td><big style="color:#455E5B">
       $<?php echo $result['price']?></big></td></tr><br /><br />

	  
		<?php if($result['stock']==0){ echo "<big style='#999999'><b>Out of Stock</b></big>"; } ?>
   <?php if($result['stock']!=0) { ?>  <tr><td></td><td>  <a  href="<cart.php?id=<?php echo $result['serial'];?>&action=add "> <input type="button" name="b1"  value="ADD" /></a></td></tr></td> <?php } ?>

</tr>
<tr><td colspan="2"><hr size="1" /></td></tr>
<?php }
 

    echo "<tr><td><p style='margin-left:332px';'margin-top:25px';'color:#FF0000';><pre>*Please fill all the quanities</pre></p></td></tr>"; 
 
?>
 
  
</table>
<input type='submit' name='formSubmit' value='Submit' id='sub' />

</form>  


<?php 
}


?>
	 
	 <?php if((isset($_POST['skills'])) || (isset($_POST['ski'])) || (isset($_SESSION['skills'])) || (isset($_SESSION['brand'])) || (isset($_POST['check2'])) )
 {
 

 ?>
	 
	 
	

<?php
	if(isset($_POST['skills']))
	{
	$skills=$_POST['skills'];
	$chec=1;
	echo $skills;
	$results=mysql_query("select * from products WHERE cat ='$skills'");
	}
	
		
	if((isset($_POST['check1'])) && (isset($_SESSION['skills'])))
	{
	echo "go";
	$skills=$_SESSION['skills'];
	$skills=$skills[0];	
	$brandy=$_POST['check1'];	
	$results=mysql_query("select * from products WHERE cat='$skills' AND brand ='$brandy'");
		
	}
	
	if((isset($_POST['check2'])) && (isset($_SESSION['brand'])) && (isset($_SESSION['skills'])))
	{
	
	$skills=$_SESSION['skills'];
	$skills=$skills[0];
	$brandy=$_SESSION['brand'];
	$brandy=$brandy[0];
		$var2=$_POST['check2'];
		if(($var2 >= 100)&&($var2 < 200))
	  {
		 $results=mysql_query("select * products where cat='$skills' AND brand='$brandy' AND (price >= 100 AND price < 200)");
		 }
		
		  if(($var2 >= 200)&&($var2 < 300))
		 {
		$results=mysql_query("select * products where cat='$skills' AND brand='$brandy' AND (price >= 200 AND price < 300)");
		 }
		if(($var2 >= 300)&&($var2 < 400))
	   {
		 $results=mysql_query("select * products where cat='$skills' AND brand='$brandy' AND (price >= 300 AND price < 400)");
		 }
		 if(($var2 >= 400)&&($var2 <= 500))
	   {
		 $results=mysql_query("select * products where cat='$skills' AND brand='$brandy' AND (price >= 400 AND price <= 500)");
	
	}
	}
	

$chec=0; $chec1=0;

	// if(isset($skills))
	// {
	// echo "go";
	// $results=mysql_query("select * from products WHERE cat ='$skills'");
	
		// if((isset($skills))&&(isset($brandy)))
		// {
		// 
		// if((isset($skills))&&(isset($brandy)) && (isset($var2)))
		// {
	  // 
		
		// }
	// }
	// }
	
	// } 


	?>
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
	

	
	
	
	<?php 
	if(isset($results))
	{
	echo "good";
	if((mysql_num_rows($results)) == 0)
	{
	echo "good1";
	}
	echo mysql_num_rows($results);
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
	<td id="fix"><img id='div11' src='<?php echo $array['picture']; ?>' /> </td>
	<td id="fix"><tr> <td>Name</td><td><?php echo $array['name']; echo "<br></td></tr>";
	echo "<tr><td>".$array['description']; echo "<br></td></tr>";
	echo "<tr><td>".$array['price']; echo "<br></td></tr>";
	?>
</td> 
<?php	 
$count=$count+1; 
}
echo '</tr>';
?>

</table>
<?php }  
 $chec=0;
$chec1=0;
?>


<?php } ?>
 </div>
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
<?php $_SESSION['cat']=0; ?>
<?php
if((!isset($_POST['skills']))||(!isset($_POST['skills']))||(!isset($_POST['skills'])))
{ 
 $array=array("100-200","200-300","300-400","400-500"); ?>

	
<?php
echo "<table><tr>";
foreach($array as $a)
{
 echo "<input type=checkbox value=readonly />$a</tr><tr>";
 }
 echo "</table>";
 echo "<table><tr>";
 $bb=array("XX","YY","ZZ","AA");
foreach($bb as $a)
{
 echo "<input type=checkbox value=readonly />$a</tr><tr>";
 }
 echo "</table>";
 }
 
?>
</div>
<?php if(isset($_POST['skills'])) {  $_SESSION['cat']=1;
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
			//$a=explode(' ',$array['brand']);
			//foreach($a as $af)
			//{
			//	echo $af."<br>";
			//}
			
			//var_dump($array);
			$brand1=array("XX","YY","ZZ","AA");
			$hello=array_diff($brand1,$arr); 
			
			
			//foreach($hello as $a)
			//{
			//echo $a;
			//}

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

//$skills=$skills[0];//or just while
//$skills=implode(" ",$skills);
echo $skills;
$brand=$brand[0];
$_SESSION['brand']=$brand;
//$brand=implode(" ",$brand);
echo $brand;
//$_SESSION['brand']=$brand;

			$results=mysql_query("select * from products WHERE cat ='$skills' AND  brand ='$brand'");
			if((mysql_num_rows($results)) == 0)
			{
				echo "good";
			}
			
			while($arr=mysql_fetch_array($results))
			{
			$ar[]=$arr['price'];
			
			}
			//same category same brand but many prices will be ter.. will differ
			$red=$ar;			
			?>
			<form action="" method="post">
			<?php
			if((count(array_filter($ar,"range1")))!=0)
			{	//will sort where 
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
			{	//will sort where 
				$one=array_intersect($red,$ar);
				$varr=$one[0];
				echo $varr;
			 echo "<input type='checkbox' name='check2[]' value=$varr onchange=this.form.submit(); /><ins>200-300</ins></tr>";
			}
			 else
			{
				
				echo  "<input type='checkbox' readonly='true' /><del>200-300</del></tr><tr>";
			}
			$ar=$red;
			if((count(array_filter($ar,"range3")))!=0)
			{	//will sort where 
			$one=array_intersect($red,$ar);
			$varr=$one[0];
			echo $varr;
			 echo "<input type='checkbox' name='check2[]' value=$varr onchange=this.form.submit(); /><ins>300-400</ins></tr>";
			}
			 
			 else
			 {
				echo  "<input type='checkbox' readonly='true' /><del>300-400</del></tr><tr>";
			}
			$ar=$red;
			if((count(array_filter($ar,"range4")))!=0)
			{	//will sort where
			
			$one=array_intersect($red,$ar);
			$varr=$one[0];
			echo $varr;
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

<style>
#sub
{
margin-left:470px;

}




#ch
{
margin-right:5px;
background-color:#CCFF66;

}

#div11
{
background-color:#66FF99;
text-align:right;
border-left:10;
}
#div1
{
padding:50px;
padding-left:20px;
}

</style>
</div>
</body>
</html>






        
