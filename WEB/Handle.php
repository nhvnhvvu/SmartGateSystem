<?php
require("phpMQTT.php"); // Đường dẫn đến thư viện MQTT

// Thông tin kết nối MQTT Broker
$server = "broker.hivemq.com";
$port = 1883;
$username = "Vulcan121"; // Tùy chọn
$password = "Vulcan121"; // Tùy chọn
$client_id = "php_mqtt_subscriber"; // Đặt một ID duy nhất cho Subscriber



// Kết nối tới MQTT Broker
$mqtt = new phpMQTT($server, $port, $client_id);

if (!$mqtt->connect(true, NULL, $username, $password)) {
    exit("Kết nối MQTT thất bại");
}

// Xử lý dữ liệu từ ESP32
function processMessage($topic, $payload) {
    // Thực hiện các xử lý dữ liệu mong muốn
    // Ví dụ: Lưu dữ liệu vào cơ sở dữ liệu
    $data = $payload;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aidays_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    $sql = "INSERT INTO history (NOTE) VALUES ('$data')";
    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được lưu vào cơ sở dữ liệu.";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}

// Subscribe tới topic để nhận dữ liệu từ ESP32
$mqtt->subscribe("Vulcan121/Pub", 0); // Thay "topic_name" bằng topic bạn muốn subscribe

while ($mqtt->proc()) {

}

$mqtt->close();
?>