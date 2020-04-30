<?php
$jsy=$_POST['jsy'];
function hq($jsy){
    $key="zR6wyiX7Sc8764nW";


    $business=base64_encode($jsy);
    $business1=$business.$key;

    $sign=md5($business1);
    $user[]=$business;
    $user[]=$sign;
    return $user;
}

require ("ljdb.php");
$name1=$_POST['name1'];
$account=$_POST['account0'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$sf=$_POST['sf'];
$ye=$_POST['ye'];
$tc=$_POST['tc'];
$zt=$_POST['zt'];
$odd=$_POST['odd'];
mysqli_query($conn,"INSERT INTO tc(account,name,mobile,address,id_number,ye,package_id,status,tc)values('$account','$name','$mobile','$address','$sf','$ye','$tc','$zt','$odd')");
mysqli_close($conn);
list($business, $sign) = hq($jsy);
$api = "http://10.0.0.4:8088/DrcomSrv/DrcomService?iusername=1114&business={$business}&sign={$sign}";
$file_contents = file_get_contents($api);
//    $output = json_decode($file_contents, true);
//    switch ($output['list'][0]['billing_group_id']) {
//        case 5:
//            $_SESSION['tc'] = "流量套餐";
//            break;
//        case 8:
//            $_SESSION['tc'] = "计时普通套餐";
//            break;
//        case 11:
//            $_SESSION['tc'] = "计时六折套餐";
//            break;
//        case 9:
//            $_SESSION['tc'] = "计时89元套餐";
//            break;
//        case 10:
//            $_SESSION['tc'] = "管理员89套餐";
//            break;
//    }
echo json_encode($file_contents);

?>
