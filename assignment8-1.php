<?php
$conn = mysqli_connect("localhost","root","","anshul") or die("Connection Failed");

$sql = "select * from student";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
$output = '<table border="1" width="100%" cellspacing="0" cellpedding="10px">
        <tr>
		<th width="100px">Id</th>
		<th>Name</th>
		<th width="100px">>Delete</th>
		</tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr><td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
  }
 $output .= "</table>";
 mysqli_close($conn);
 echo $output;
}else{
	echo "<h2> no record.</h2>";
}

?>