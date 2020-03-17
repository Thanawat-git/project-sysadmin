<html>
<body>
<?php
// define variables and set to empty values
$zip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $zip = test_input($_POST["name"]);
}

function test_input($data) {
  $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 align = 'center' >ค้นหาจังหวัด ประเทศไทย</h2>
<form align = 'center' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  หมายเลขจังหวัด: <input type="text" name="name">
  <br><br>
  <input type="submit" name="ค้นหา" value="Submit">  
</form>

</body>
</html>

<?php

$servername = "192.168.100.12";
$username = "dbuser";
$password = "dbpass";
$dbname = "provinces";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//mysqli_set_charset($conn, "utf8");
//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM provinces WHERE id = $zip"; 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table border='1' align='center' width='500' bgcolor='#ffcc99'>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#ffcc99'><td>จังหวัดที่</td><td>ชื่อจังหวัด</td>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center' bgcolor='ffffff'>" .$row["id"] .  "</td> ";  
  echo "<td align='center' bgcolor='ffffff'>" .$row["name_en"] .  "</td> ";
  //echo "<td bgcolor='ffffff'>" .$row["name_th"] .  "</td> ";
  //echo "<td>" .$row["member_lname"] .  "</td> ";
  //echo "<td>" .$row["email"] .  "</td> ";
  //แก้ไขข้อมูล
  //echo "<td bgcolor='ffffff'><a href='UserUpdateForm.php?ID=$row[0]'>edit</a></td> ";
  
  //ลบข้อมูล
  //echo "<td bgcolor='ffffff'><a href='UserDelete.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\">del</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($conn); 
?>

</body>
</html>