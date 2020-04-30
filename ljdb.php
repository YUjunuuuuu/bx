<?php

header("content-type:text/html;charset=utf-8");
$conn = mysqli_connect("localhost", "root", "ysyhljt", "bm");
mysqli_query($conn,"set names 'utf8'");
if (!$conn) {
    echo "链接失败";
}

