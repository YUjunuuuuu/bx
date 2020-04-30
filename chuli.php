<?php
require("ljdb.php");
$id=$_GET['id'];
date_default_timezone_set("Asia/Shanghai");
$time=date("Y-m-d H:i:s");
if(mysqli_query($conn,"UPDATE bx
        SET status=\"1\",wc='$time'
        WHERE id=$id")){
    mysqli_close($conn);
    echo "<script> location.href=\"gl.php\";</script>";
}
?>