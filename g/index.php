<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form" action="index.php" method="POST">
					<span class="contact2-form-title">
						USER DETAILS
					</span>

					<div class="wrap-input2 validate-input" data-validate="Name is required">
						<input class="input2" type="text" required name="username">
						<span class="focus-input2" data-placeholder="USER NAME"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input2" type="text" required name="task">
						<span class="focus-input2" data-placeholder="TASK TO BE DONE"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input2" type="text" name="sub1" >
						<span class="focus-input2" data-placeholder="SUB TASK 1"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input2" type="text" name="sub2" >
						<span class="focus-input2" data-placeholder="SUB TASK 2" ></span>
					</div>

				

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn" name="save">
								Send Your Message
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>

<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "hari";
$conn=mysqli_connect($servername,$username,$password,"$dbname");

if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

if(isset($_POST['save']))
{	 
	 $username = $_POST['username'];
	 $task = $_POST['task'];
	 $sub1 = $_POST['sub1'];
	 $sub2 = $_POST['sub2'];
$duplicate=mysqli_query($conn,"select * from har where Username='$username' or task='$task'");

	 if (mysqli_num_rows($duplicate)>0)
{
	echo "record already exist";
//header("Location: index.php");
}
else{
	 $sql = "INSERT INTO har (username,task,sub1,sub2)
	 VALUES ('$username','$task','$sub1','$sub2')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	}
}
?>

<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "hari";
$conn=mysqli_connect($servername,$username,$password,"$dbname");

$result = mysqli_query($conn,"SELECT * FROM har");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 
 </head>
<body>
	<br><br>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table border="3" style="margin-left: 340px;">
  
  <tr style="color: red; font-size: 20px;">
    <td>ID</td>
    <td>USER NAME</td>
    <td>TASK TO BE DONE</td>
    <td>SUB TASK 1</td>
    <TD>SUB TASK 2</TD>
    <TD>TASK COMPLETED</TD>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
		<tr class="<?php if(isset($classname)) echo $classname;?>">

    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Username"]; ?></td>
    <td><?php echo $row["task"]; ?></td>
    <td><?php echo $row["sub1"]; ?></td>
    <td><?php echo $row["sub2"]; ?></td>
    	<td ><a style="color: green;" href="delete-process.php?userid=<?php echo $row["id"]; ?>">COMPLETE</a></td>


</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
<br><br><br><br><br><br>
 </body>
</html>