<?php
session_start();
$con=mysqli_connect("localhost","root","","hospitalms");
if(isset($_POST['patsub'])){
	$email=$_POST['email'];
	$password=$_POST['password2'];
	$query="select * from patreg where email='$email' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $_SESSION['pid'] = $row['pid'];
      $_SESSION['username'] = $row['fname']." ".$row['lname'];
      $_SESSION['fname'] = $row['fname'];
      $_SESSION['lname'] = $row['lname'];
      $_SESSION['pname'] = $row['pname'];
      $_SESSION['contact'] = $row['contact'];
      $_SESSION['email'] = $row['email'];
    }
		header("Location:admin-panel.php");
	}
  else {
    echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'index.php';</script>");
    // header("Location:error.php");
  }
		
}
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}




// function display_docs()
// {
// 	global $con;
// 	$query="select * from doctb";
// 	$result=mysqli_query($con,$query);
// 	while($row=mysqli_fetch_array($result))
// 	{
// 		$name=$row['name'];
//     $cost=$row['docFees'];
// 		echo '<option value="'.$name.'" data-price="' .$cost. '" >'.$name.'</option>';
// 	}
// }

if(isset($_POST['doc_sub']))
{
  $doctorname=$_POST['doctorname'];
	$doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $docFees=$_POST['docFees'];
	$query="insert into doctb(doctorname,username,password,email,docFees)values('$doctorname','$doctor','$dpassword','$demail','$docFees')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
function display_admin_panel(){
	
}
?>