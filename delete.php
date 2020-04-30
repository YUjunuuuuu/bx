<?php
require("ljdb.php");
$id=$_GET['id'];

if(mysqli_query($conn,"DELETE FROM bx WHERE id=$id")){
    mysqli_close($conn);
    echo "<script> location.href=\"gl.php\";</script>";
}

?>