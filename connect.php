<?php

$host="localhost";
$user="root";
$password="";
$db="project_login";

mysql_connect($host,$user,$password);
mysql_select_db($db);

if(isset($_POST['"mail_id"'])){

    $uname=$_POST['mail_id'];
    $password=$_POST['password'];
    
    $sql="select * from login where login mail_id='".$uname."' AND password='".$password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1){
    
        exit();
    }
    else{
        exit();
    }
}

?>