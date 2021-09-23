<!DOCTYPE html>
<html>
<head>
<title>form</title>
</head>
<body>
<form method ="Post" name ="form">
<?php
$id = "";
$name = "";
$color = "";
$ram = "";
$buttonText = "Add Data";

if(isset($_GET["edit"])){
	$id = $_GET["id"];
	$sql = "select * from phone where id = '$id'";
	$conn = db_connection();
    $result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$name = $row["name"];
	$color= $row["color"];
    $ram = $row["ram"];
	$buttonText = "Update Data";
}
	?>

Name : <input type = "text" value = "<?php echo $name; ?>" name = "name" id = "name"/><br/><br/>
Color: <input type = "text" value = "<?php echo $color; ?>" name = "color" id = "color"/><br/><br/>
Ram: <input type = "text" value = "<?php echo $ram; ?>" name = "ram" id = "ram"/><br/><br/> 
<input type = "submit" name = "add_data" id = "add_data" value="<?php echo $buttonText; ?>"/>
<input type="hidden" name="data_id" value="<?php echo $id; ?>" />


</form>
 <?php 
function db_connection(){
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Anshul";
  $conn = new mysqli($servername, $username, $password, $dbname);
  return $conn;
}
if(isset($_POST["add_data"])){
$conn = db_connection();
$name = $_POST['name'];	
$color= $_POST['color'];	
$ram = $_POST['ram'];
$createddate = date("y-m-d h:i:s");
   if($_POST["add_data"] == "Add data"){
	$sql = 	"insert into phone (name, color, ram, createddate)
	values('$name', '$color', '$ram', '$createddate')";
	if ($conn->query($sql) === TRUE){
	  echo "New record created successfully";
	}  else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
    } else if($_POST["add_data"] == "Update Data"){
		$updateddate = date("Y-m-d h:i:s");
       $id = $_POST["data_id"];
        $sql = "update phone set name = '$name', color = '$color', ram = '$ram', modifieddate = '$updateddate' where id='$id'";
        mysqli_query($conn,$sql);
	}

    $conn->close();
    }

if(isset($_GET["delete"])){
$conn = db_connection();
$id = $_GET["id"];	
$sql = "delete from phone where id = '$id'";
mysqli_query($conn,$sql);
}
?>
<br>
<br>
<table border="1">
<tr>
<td>name</td>
<td>color</td>
<td>ram</td>
<td>created date</td>
<td>modified date</td>
<td>edit</td>
<td>delete</td>
</tr>
<?php 
$conn = db_connection();
$sql = "select * from phone";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
?>
   <tr>
   <td><?php echo $row ["name"]; ?></td>
   <td><?php echo $row ["color"]; ?></td>
   <td><?php echo $row ["ram"]; ?></td>
    <td><?php echo $row ["createddate"]; ?></td>
	 <td><?php echo $row ["modifieddate"]; ?></td>
    <td><a href="/test/assignment4.php?id=<?php echo $row["id"]; ?>&edit">edit</a></td>
    <td><a href="/test/assignment4.php?id=<?php echo $row["id"]; ?>&delete">delete</a></td>
	
   </tr>
<?php
}
 ?>
 </table>
 <?php
 // Associative array
$conn->close();
 ?>
</body>
</html>

   



	

