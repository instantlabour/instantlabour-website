<?php
$username = $_POST["username"];
$conn=new mysqli("localhost","instuser","root","cdat");
$conn->query("SELECT * FROM signup1 WHERE username='{$username}'");
if($conn->affected_rows){
    echo "true";
}else{
    echo "false";
}
?>