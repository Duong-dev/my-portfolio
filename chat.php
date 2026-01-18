<?php
// chat.php - File trung gian để bảo mật API Key
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://duongle.space'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// 1. CẤU HÌNH API KEY TẠI ĐÂY (Server-side, người dùng không thấy được)
$apiKey = "XXXXXXXXXXXXXXXXXXXXXXXXXXXX"; 

// 2. Nhận dữ liệu từ trình duyệt gửi lên
$inputJSON = file_get_contents('php://input');

// 3. Gọi sang Google Gemini API
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $inputJSON);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// 4. Trả kết quả về cho trình duyệt
echo $response;
?>
