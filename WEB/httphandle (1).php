<?php
require('connection.php');
function removeAccents($str) {
    $accents = array(
        'à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ',
        'đ',
        'è', 'é', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ',
        'ì', 'í', 'ỉ', 'ĩ', 'ị',
        'ò', 'ó', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ',
        'ù', 'ú', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự',
        'ỳ', 'ý', 'ỷ', 'ỹ', 'ỵ',
        'À', 'Á', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ',
        'Đ',
        'È', 'É', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ',
        'Ì', 'Í', 'Ỉ', 'Ĩ', 'Ị',
        'Ò', 'Ó', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ',
        'Ù', 'Ú', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự',
        'Ỳ', 'Ý', 'Ỷ', 'Ỹ', 'Ỵ'
    );

    $noAccents = array(
        'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
        'd',
        'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
        'i', 'i', 'i', 'i', 'i',
        'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
        'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
        'y', 'y', 'y', 'y', 'y',
        'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A',
        'D',
        'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E',
        'I', 'I', 'I', 'I', 'I',
        'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O',
        'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U',
        'Y', 'Y', 'Y', 'Y', 'Y'
    );

    $str = strtr($str, array_combine($accents, $noAccents));

    return $str;
}

function subtractStrings($string1, $string2) {
    $array1 = explode("-", $string1);
    $array2 = explode("-", $string2);

    $resultArray = array();
    for ($i = 0; $i < count($array1); $i++) {
        $resultArray[] = $array1[$i] - $array2[$i];
    }

    $resultString = implode("-", $resultArray);
    return $resultString;
}


date_default_timezone_set('Asia/Bangkok');
$date = date('d-m-Y');
$time = date('H-i-s');
$nam = date('Y');
$thang = date('m');
$ngay = date('d');
if (!isset($_GET['ID'])) {
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

$ID = $_GET['ID'];
$sql = "SELECT fullname FROM member WHERE uid = $ID";
$result = $conn->query($sql);


if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullname = $row['fullname'];
    } 
}

$sql = "SELECT TIME FROM realtime WHERE UID = $ID";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $in_time = $row['TIME'];
    $stay_time = subtractStrings($time, $in_time);


    $sql = "UPDATE $$ID SET Total_Time = $stay_time WHERE NAM = $nam THANG = $thang NGAY = $ngay";
    $result=$conn->query($sql);
    if ($result === false){
        $sql = "INSERT INTO $$ID (NAM, THANG, NGAY, Total_Time) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $nam, $thang, $ngay, $stay_time);
        $stmt->execute();
        echo "OK";
    }

    $note = "OUT";
    $sql = "DELETE FROM realtime WHERE UID = $ID";
    $conn->query($sql);

} 
else{
    $note = "IN";
    $sql = "INSERT INTO realtime (UID, NAME, TIME) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $ID,$fullname,$time);
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