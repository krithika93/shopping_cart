<!DOCTYPE html>
<head>
</head>
<body>
<form action="file.php" method="post">
<ul>
<li><input type="radio" name ="s1[]" value="4">Good</input></li>
<li><input type="radio" name="s1[]" value="3">Average</input></li>
<li><input type="radio" name="s1[]"  value="5">Best</input></li>
<li><input type="radio" name="s1[]" value="0">Poor</input></li>
<li><input type="radio" name="s1[]" value="2">fair</input></li>
</ul>
</form>
</body>
<?php //inheritance css
if( file_exists("hello.txt"))
{
fopen("hello.txt","w+");
}
$var1=file_get_contents();
$count=count($var1);
$var2=$_POST['s1'];
$var2=explode($var2,' ');
for(var i=0;i<

