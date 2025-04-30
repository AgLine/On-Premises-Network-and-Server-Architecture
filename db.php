<?php
// MySQL 접속 정보
$host = "10.128.0.10"; // DB 서버 IP
$user = "myuser";     // MySQL 사용자명
$pass = "1q2w3e4r";   // MySQL 비밀번호
$dbname = "db_master01";     // 사용할 데이터베이스 이름

// MySQL 접속
$conn = new mysqli($host, $user, $pass, $dbname);

// 접속 에러 확인
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

// 실행할 SQL문
$sql = "SELECT * FROM weather_data ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

// HTML 출력 시작
echo "<!DOCTYPE html>
<html lang='ko'>
<head>
    <meta charset='UTF-8'>
    <title>DB 결과 보기</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2 style='text-align:center;'>DB 결과</h2>";

if ($result->num_rows > 0) {
    // 테이블 헤더
    echo "<table><tr>";

    // 컬럼 이름 뽑아오기
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
    }
    echo "</tr>";

    // 데이터 출력
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach($row as $value){
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align:center;'>데이터가 없습니다.</p>";
}

// 연결 종료
$conn->close();

echo "</body></html>";
?>