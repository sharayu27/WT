<html>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr> 
    	<td align="right">First Name:</td>
    	<td align="left"><input type="text" name="fname"></td>
</tr>
   <br><br>
<tr>
  	 <td align="right">Last Name:</td>
   	 <td align="left"> <input type="text" name="lname"></td>
</tr>
   <br><br>
<tr>
   	<td align="right">Adress</td>
        <td align="left"><textarea name="address" rows="4" cols="30"></textarea></td>
</tr>
   <br><br>
    


  <tr>
	<td align="right"> Email:</td>
	<td align="left"> <input type="text" name="email"></td>
</tr>

   <br><br>
<tr>

   <td align="right">Comment: </td>
<td align="left"><textarea name="comment" rows="5" cols="40"></textarea></td>
</tr>
   <br><br>
<tr>
   <td align="right">Mobile Number: </td>
<td align="left"><input type="text" name="mno"> </td>
</tr>
   <br><br>
   
<tr>

  <td align="right">   <input type="submit" name="submit" value="submit" > </td>
</tr> 

<tr>

   
  <td align="right">  <input type="submit" name="display" value="display" > </td>
</tr>

</form>

<?php
$con=mysqli_connect("127.0.0.1","root","","feedback");


if (mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
else
echo"connected successfully";






if(isset($_POST['submit']))
{

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$email =  $_POST['email'];
$comment =  $_POST['comment'];
$mobileno = $_POST['mno'];

$sql="insert into feedback_tb1(fname,lname,address,email,comment,mobileno)values('$fname','$lname','$address','$email','$comment','$mobileno')";


if (!mysqli_query($con,$sql))
 {
  die('Error: ' . mysqli_error($con));
 }
echo "1 record added";

  
}


if(isset($_POST['display']))
{

  echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Address</th>
<th>Email</th>
<th>Comment</th>
<th>Mobileno</th>

</tr>";


  $result=mysqli_query($con,"select * from feedback_tb1");

   while($row=mysqli_fetch_array($result))
   {
  	echo "<tr>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['comment'] . "</td>";
  echo "<td>" . $row['mobileno'] . "</td>";
  echo "</tr>";
    }
}


mysqli_close($con);

?>

</html>