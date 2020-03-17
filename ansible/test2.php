

<html>
<head>
</head>
<body>
</body>
</html>
<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
//include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$servername = "192.168.100.70";
$username = "dbuser";
$password = "dbpass";
$dbname = "provinces";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT id, code, name_en, name_th FROM amphures"; 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table border='1' align='center' width='500' bgcolor='#ffcc99'>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#ffcc99'><td>รหัส</td><td>ชื่อสินค้า</td><td>ราคา</td><td>ชชช</td><td>แก้ไข</td><td>ลบ</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td bgcolor='ffffff'>" .$row["id"] .  "</td> "; 
  echo "<td bgcolor='ffffff'>" .$row["code"] .  "</td> ";  
  echo "<td bgcolor='ffffff'>" .$row["name_en"] .  "</td> ";
  echo "<td bgcolor='ffffff'>" .$row["name_th"] .  "</td> ";
  //echo "<td>" .$row["member_lname"] .  "</td> ";
  //echo "<td>" .$row["email"] .  "</td> ";
  //แก้ไขข้อมูล
  echo "<td bgcolor='ffffff'><a href='UserUpdateForm.php?ID=$row[0]'>edit</a></td> ";
  
  //ลบข้อมูล
  echo "<td bgcolor='ffffff'><a href='UserDelete.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\">del</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($conn);
?>
