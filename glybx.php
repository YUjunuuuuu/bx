<?php
session_start();
class bx
{
    public  $name;
    public $account;
    public $mobile;
    public $address;
    public $reason;
    public $gly;
    public $ip;
    public $time;
    function bx1()
    {
        if(isset($_POST['name'])){
            $name=$_POST['name'];
            $account=$_POST['account'];
            $mobile=$_POST['mobile'];
            $address=$_POST['address'];
            $reason=$_POST['reason'];
            $time=date("Y-m-d H:i:s");
            $ip=$_SERVER['REMOTE_ADDR'];
            $gly=$_SESSION['gly'];
            require("ljdb.php");

            if(mysqli_query($conn, "INSERT INTO bx(name,account,mobile,address,reason,time,pj,status,ip,wc,gly)values('$name','$account','$mobile','$address','$reason','$time',' ','0','$ip',' ','$gly')") ){
                echo "<script> 
location.href=\"gl.php\";
</script>";
            }

            mysqli_close($conn);
        }
    }
}
$user=new bx();
$user->bx1();
?>