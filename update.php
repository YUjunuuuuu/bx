<?php
session_start();
$pwd=$_POST['password1'];
$pwd1=$_POST['password2'];
if($pwd!=$pwd1){
    echo "<script> alert(\"密码不相符，请重新输入！\");
location.href=\"gl.php\";
</script>";
}else {
    $pwd3=md5($pwd);
    require("ljdb.php");
    $result = mysqli_query($conn, "UPDATE index SET pwd='" . $pwd3 . "' WHERE name='" . $_SESSION['gly'] . "'");
    if ($result) {
        echo "<script> 
location.href=\"gl.php\";
</script>";
    }
}
?>