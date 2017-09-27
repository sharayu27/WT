<html>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr> 
    	<td align="right">Enter Name:</td>
    	<td align="left"><input type="text" name="name"></td>
</tr>
   <br><br>
<tr>
	<td align="right"> Enter Password:</td>
	<td align="left"> <input type="password" name="password"></td>
</tr>

   <br><br>

   
<tr>

  <td align="left"><input type="submit" name="submit" value="submit" ></td>
  <td align="left"><input type="submit" name="login" value="login" ></td>
</tr>


</form>
<?php
$con=mysqli_connect("127.0.0.1","root","","logindata");


if (mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
else
echo"Connected Successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

$name = $_POST['name'];
$password = $_POST['password'];


if(isset($_POST['submit']))

{
$sql="insert into logintb(name,pwd)values('$name','$password')";


if (!mysqli_query($con,$sql))
 {
  die('Error: ' . mysqli_error($con));
 }
echo "1 record added";


}

else
{

if(isset($_POST['login']))
{

session_start();
$message="";

  
 
  $result=mysqli_query($con,"SELECT * FROM logintb WHERE name='$name' AND pwd='$password'");

   $row=mysqli_fetch_array($result);

    $rowCheck = mysqli_num_rows($result);
    
   
  if($rowCheck==0)
{

$message = "Invalid Username or Password!";
echo $message;
}
else
   {
        
	$_SESSION['name'] = $row['name'];
        $_SESSION['pwd']= $row['pwd'];
        echo $row['name'];
        session_write_close();
	header('Location: home.php');

   } 
 
}

}
}
mysqli_close($con);

?>

</html>