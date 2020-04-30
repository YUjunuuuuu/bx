<?php
session_start();
if(!isset($_SESSION['submit1'])){
    echo"<script> alert(\"请先登录！\");
location.href=\"index.php\";</script>";
}
require("ljdb.php");
$czzh=$_POST['czzh'];
$czxm=$_POST['czxm'];
if($czzh){
    $result2=mysqli_query($conn,"SELECT * FROM bx where account='".$czzh."'");
}
if($czxm){
    $result2=mysqli_query($conn,"SELECT * FROM bx where name='".$czxm."'");
}
$result=mysqli_query($conn,"SELECT * FROM bx ORDER BY id DESC ");

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>管理员管理界面</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script>-->
<!--    <script src="assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--    [if lt IE 9]>-->
<!-- <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
<!--   <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>-->
<!--    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>-->
<!--    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--    <![endif]-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#waitWork").click(function(){
                $(".main").load("yhbd.php");
            });
            $("#update").click(function(){
                $(".main").load("update.html");
            });
            $("#ztc").click(function(){
                $(".main").load("ztc.html");
            });

        });
    </script>
    <style type="text/css">
        .modal-header{
            border-style: none;
        }
        .modal-footer{
            border-style: none;
        }
        .form-group{
            margin-top: 20px;
        }
        .la{
            text-align:right;
            line-height: 34px;
            height:34px;
        }
        label{
            display:block;
        }
        .fg{
            margin-bottom: 15px;
        }
        .nav-sidebar li a:hover{
            color:white;
            background-color: #2e6da4;

        }
        .nav-sidebar li a:focus{
            color:white;
            background-color: #2e6da4;
        }
        .bt{
            color:red;
        }

    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">管理员后台</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">待添加</a></li>
                <li><a href="#">待添加</a></li>
                <li><a href="#">待添加</a></li>
                <li><a href="#">待添加</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li ><a href="gl.php">用户报修<span class="sr-only">(current)</span></a></li>
                <li ><a  id="waitWork" href="#">用户报修填写</a></li>
                <li><a id="ztc" href="#">修改套餐</a></li>
                <li><a id="update" href="#">修改密码</a></li>
            </ul>
<!--            <ul class="nav nav-sidebar">-->
<!--                <li><a href="">Nav item</a></li>-->
<!--                <li><a href="">Nav item again</a></li>-->
<!--                <li><a href="">One more nav</a></li>-->
<!--                <li><a href="">Another nav item</a></li>-->
<!--                <li><a href="">More navigation</a></li>-->
<!--            </ul>-->
<!--            <ul class="nav nav-sidebar">-->
<!--                <li><a href="">Nav item again</a></li>-->
<!--                <li><a href="">One more nav</a></li>-->
<!--                <li><a href="">Another nav item</a></li>-->
<!--            </ul>-->
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">用户报修主界面<small>你好👋 <?php echo $_SESSION['gly'];?></small></h1>

            <div class="row">
                <form action="gl.php" method="post">
                <div class="col-md-4">
                    <label>按账号查找</label>
                    <input type="text" class="form-control" placeholder="账号" name="czzh">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info" style="margin-top: 15%">查找</button>
                </div>
                </form>
                <form action="gl.php" method="post">
                <div class="col-md-4">
                    <label>按姓名查找</label>
                    <input type="text" class="form-control" placeholder="姓名" name="czxm">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info" style="margin-top: 15%">查找</button>
                </div>
                </form>

            </div>


            <h2 class="sub-header">报修表</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>用户姓名</th>
                        <th>报修账号</th>
                        <th>手机号</th>
                        <th>住址</th>
                        <th>报修时间</th>
                        <th>报修详情</th>
                        <th>是否已处理</th>
                        <th>处理详情</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($czzh||$czxm){$result=$result2;}
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['account'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['time'];?></td>
                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="<?php echo '#'.$row['id'];?>">报修详情</button></td>
                        <td><a type="button" class="btn btn-warning" href="chuli.php?id=<?php echo $row['id']?>">处理</a></td>
                        <td><?php if($row['status']==0){echo "<strong style=\"color: red\">未处理</strong>";}else echo "已处理";?></td>
                        <td><a type="button" class="btn btn-success" href="delete.php?id=<?php echo $row['id'];?>">删除</a></td>
                    </tr>
                        <div class="modal fade" id="<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            报修详情
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>姓名</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['name']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>报修账号</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['account']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>手机号</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['mobile']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>IP地址</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['ip']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>管理员</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['gly']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>报修地址</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['address']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>报修时间</label></div>
                                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['time']?>"></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>报修原因</label></div>
                                            <div class="col-md-10"><textarea class="form-control" rows="5"><?php echo $row['reason']?></textarea></div>
                                        </div>
                                        <div class="row fg">
                                            <div class="col-md-2 la"><label>评价</label></div>
                                            <div class="col-md-10"><textarea class="form-control" rows="5"><?php echo $row['pj']?></textarea></div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                        </button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
                    <?php };mysqli_close($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
<!--<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
