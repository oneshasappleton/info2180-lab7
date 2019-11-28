<?php
$host = "localhost";
$username = 'root';
$password = '';
$dbname = 'world';

$q = $_REQUEST['q'];


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if ($q !== ""){
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$q = "%$q%";
$stmt = $conn->prepare("SELECT * from countries where name like ?");
$stmt->execute([$q]);
$result = $stmt->fetchAll();

echo json_encode($result);
}else{
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $conn->query("SELECT * from countries");
    $result = $stmt->fetchAll();
    echo json_encode($result);
}
// $stmt = $conn->query("SELECT * from countries");
// $stmt->execute([$q]);
// $result = $stmt->fetchALL();
// echo $result;

