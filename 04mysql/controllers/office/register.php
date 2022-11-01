<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// 创建连接
$mysqli = new MySQLi("localhost", "root", "", "mydb");

if (!$mysqli) {

    die($mysqli->error);
}
$mysqli->set_charset('utf8');


getuserrlist($mysqli);
$mysqli->close();
function register($mysqli)
{
    $sql = "insert into demo(username,age,gender) values(? ,? ,?)";
    $mysqli_stmt = $mysqli->prepare("$sql");

    $username = $_GET["username"];
    $age = $_GET["age"];
    $gender = $_GET["gender"];

    $mysqli_stmt->bind_param('sii', $username, $age, $gender);

    // 设置参数并执行

    if ($mysqli_stmt->execute()) {
        echo $mysqli_stmt->insert_id;
        echo    PHP_EOL;
    } else {
        echo $mysqli_stmt->error;
    }
    $mysqli_stmt->free_result();

    $mysqli_stmt->close();
}





function getuserrlist($mysqli)
{
    $sql = "insert into user(username,password) values(?,?) ";

    $mysqli_stmt = $mysqli->prepare("$sql");

    $username=$_POST['username'];
    $password=$_POST['password'];
    $mysqli_stmt->bind_param("ss",$username,$password);


    
    if ($mysqli_stmt->execute()) {
       echo  $mysqli_stmt->insert_id;
       echo PHP_EOL;
       echo"<script> alert('恭喜你注册成功'); window.location.href='../../view/office/login.html'</script>";
    }
    else {
        echo $mysqli_stmt->error;
    }


    $mysqli_stmt->free_result();

    $mysqli_stmt->close();
}
