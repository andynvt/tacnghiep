<?php

$host="localhost";

$username="root";

$password="";

$db_name="tacnghiep";

$tbl_name="account";

mysql_connect("$host", "$username", "$password")or die("Không thể kết nối");

mysql_select_db("$db_name")or die("cannot select DB");

$myusername=$_POST['username'];

$mypassword=$_POST['password'];

if(isset($_POST['dangnhap'])){
    
    $sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

    $result=mysql_query($sql);

    $count=mysql_num_rows($result);

    if($count>0){

    echo"<script>alert('<h3> Đăng nhập thành công !</h3>')</script>";

    }

    else {

    echo "<script>alert('<h3>Sai tên đăng nhập hoặc mật khẩu</h3>')</script>";

    }
}

?>
