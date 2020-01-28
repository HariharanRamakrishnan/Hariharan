<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "hari";
$conn=mysqli_connect($servername,$username,$password,"$dbname");

$sql = "DELETE FROM har WHERE id='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("location:index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>