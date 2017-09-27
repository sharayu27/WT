
<html>

<title>FORM</title>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr> 
    	<td align="left">FIRST NAME:</td>
    	<td align="left"><input type="text" name="fname" id="fname"></td>
</tr>

<tr> 
    	<td align="left">MIDDLE NAME:</td>
    	<td align="left"><input type="text" name="mname"></td>
</tr>
<tr> 
    	<td align="left">LAST NAME:</td>
    	<td align="left"><input type="text" name="lname"></td>
</tr>
<tr>
	<td align="left">Gender:</td>
	<td align="left"><input type="radio" name="gender" value="Male">Male
	<input type="radio" name="gender" value="Female">Female</td>
</tr>
  
<tr>
	<td align="left"> Email ID:</td>
	<td align="left"> <input type="text" name="email"></td>
</tr>

<tr>
   	<td align="left">Mobile Number: </td>
	<td align="left"><input type="text" name="mno"> </td>
</tr>
   

<tr>

   	<td align="left">Permanent Address: </td>
	<td align="left"><textarea name="paddress" rows="5" cols="40"></textarea></td>
</tr>

<tr>

   	<td align="left">Temporary Address: </td>
	<td align="left"><textarea name="taddress" rows="5" cols="40"></textarea></td>
</tr>
<tr>

   	<td align="left">Comments: </td>
	<td align="left"><textarea name="comments" rows="5" cols="40"></textarea></td>
</tr>

   
<tr>

   <td align="left"><input type="submit" name="SUBMIT" value="SUBMIT"></td>
   <td align="left"><input type="submit" name="UPDATE" value="UPDATE"></td>
   <td align="left"><input type="submit" name="DELETE" value="DELETE"></td>
   <td align="left"><input type="submit" name="DISPLAY" value="DISPLAY"></td>
</tr>


</form>

<?php

$con=mysqli_connect("127.0.0.1","root","","addressbook");


if (mysqli_connect_error())
 {
  echo "Failed to connect to MySQL." . mysqli_connect_error();
 }
else
echo"Connected Successfully";

if($_SERVER['REQUEST_METHOD']=="POST")
{
$fname = $_POST[ 'fname' ];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender=$_POST['gender'];
$email =  $_POST['email'];
$mno = $_POST['mno'];
$paddress = $_POST['paddress'];
$taddress =  $_POST['taddress'];
$comments =  $_POST['comments'];



if(isset($_POST['SUBMIT']))

{

//FirstName validation 
if (!$fname)
{
echo "<script type='text/javascript'>\n";
echo "alert('You must enter first name');\n";
echo "</script>";
exit;
}


//LastName validation 
if (!$lname)
{
echo "<script type='text/javascript'>\n";
echo "alert('You must enter last name');\n";
echo "</script>";
exit;
}

//Gender validation 
if (!$gender)
{
echo "<script type='text/javascript'>\n";
echo "alert('You must enter your gender');\n";
echo "</script>";
exit;
}

//PermanentAddress validation 
if (!$paddress)
{
echo "<script type='text/javascript'>\n";
echo "alert('You must enter your permanent address');\n";
echo "</script>";
exit;
}

$sql="insert into addbooktb(fname,mname,lname,gender,email,mno,paddress,taddress,comments)values('$fname','$mname','$lname','$gender','$email','$mno','$paddress','$taddress','$comments')";


if (!mysqli_query($con,$sql))
{	  
die('Error: ' . mysqli_error($con));
}	

echo "1 record added";



}

if(isset($_POST['UPDATE']))

{
//FirstName validation 
if (!$fname)
{
echo "<script type='text/javascript'>\n";
echo "alert('You must enter first name');\n";
echo "</script>";
exit;
}

$sql="update addbooktb"." set  mname='$mname',lname='$lname',gender='$gender',email='$email',mno='$mno'
,paddress='$paddress',taddress='$taddress',comments='$comments' where fname='$fname'  ";


if (!mysqli_query($con,$sql))
 {
  die('Error: ' . mysqli_error($con));
 }
echo "1 record updated";
}


if(isset($_POST['DELETE']))

{

//FirstName validation 
if (!$fname)
{
echo "<script type='text/javascript'>\n";
echo "alert('You must enter first name');\n";
echo "</script>";
exit;
}

$sql="delete  from addbooktb where fname='$fname'";

if (!mysqli_query($con,$sql))
 {
  die('Error: ' . mysqli_error($con));
 }
echo "1 record deleted";
}


if(isset($_POST['DISPLAY']))
{

 echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>MiddleName</th>
<th>LastName</th>
<th>Gender</th>
<th>EmailID</th>
<th>MobileNo</th>
<th>Permanent Address</th>
<th>Temporary Address</th>
<th>Comments</th>
</tr>";


  $result=mysqli_query($con,"select * from addbooktb");

   while($row=mysqli_fetch_array($result))
   {
	echo "<tr>";
 	echo "<td>" . $row['fname'] . "</td>";
 	echo "<td>" . $row['mname'] . "</td>";
 	echo "<td>" . $row['lname'] . "</td>";
	echo "<td>" . $row['gender'] . "</td>";
 	echo "<td>" . $row['email'] . "</td>";
	echo "<td>" . $row['mno'] . "</td>";
  	echo "<td>" . $row['paddress'] . "</td>";
  	echo "<td>". $row['taddress'] ."</td>";
	echo "<td>". $row['comments'] ."</td>";
  	echo "</tr>";
    }
}
}




mysqli_close($con);

?>

</html>