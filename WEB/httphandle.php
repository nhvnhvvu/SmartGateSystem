<?php
require('connection.php');
date_default_timezone_set('Asia/Bangkok');
$date = strval(date('d-m-Y'));
$time = strval(date('H-i-s'));

echo $date;

if (!isset($_GET['ID'])) {
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

$ID = $_GET['ID'];
$sql = "SELECT fullname FROM member WHERE uid = $ID";
$result = $conn->query($sql);


if ($result) {
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            $fullname = $row['fullname'];
            echo $fullname ;
        }
    } 
}

$sql = "SELECT NAME FROM realtime WHERE UID = $ID";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $note = "OUT";
    $sql = "DELETE FROM realtime WHERE UID = $ID";
    $conn->query($sql);
} 
else{
    $note = "IN";
    $sql = "INSERT INTO realtime (UID, NAME) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $ID,$fullname);
    $stmt->execute();
}

$sql = "INSERT INTO history (DATE, NAME, TIME, NOTE, UID) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $date, $fullname, $time, $note, $ID);
$stmt->execute();

$stmt->close();
$conn->close();
header('HTTP/1.1 200 OK');


?>