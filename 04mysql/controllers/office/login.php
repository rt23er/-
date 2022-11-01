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
// r($mysregisteqli);

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




//读取并显示
function getuserrlist($mysqli)
{
    $sql = "select username,age,gender from user where username =? and password = ? ";

    $mysqli_stmt = $mysqli->prepare($sql);

    $username=$_POST['username'];
    $password=$_POST['password'];
    $mysqli_stmt->bind_param("ss",$username,$password);


    // //绑定参数

    // $mysqli_stmt->bind_param("i",$id);

    //绑定结果集



    if ($mysqli_stmt->execute()) {
        $username = null;
        $age = null;
        $gender = null;


        $mysqli_stmt->bind_result($username,$age,$gender);
        while ($mysqli_stmt->fetch()) {

            echo "欢迎" . $username;
            
            echo "<br> 今年年龄：" . $age;
           
            if ($gender==1){
                $gender='女';
            }
            else if($gender==0){
                $gender='男';

            }
            else if ($gender==2){
                $gender='未知';
            }
            echo "<br> 性别：" . $gender;
        }
        if($mysqli_stmt->fetch()==null){
            echo "没有该用户";
            
        }
    }
   

    //取出绑定的结果集



    //关闭结果集

    $mysqli_stmt->free_result();

    $mysqli_stmt->close();
}
