<?php
session_start();
require("ljdb.php");
$result=mysqli_query($conn,"select * from bx where gly='".$_SESSION['gly']."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户表单填写</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="col-sm-9  col-md-10  main">
    <form class="form-horizontal" method="post" action="glybx.php">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="姓名" name="name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">账号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="账号" name="account">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">手机号码</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mobile" placeholder="手机号码" name="mobile">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">住址</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" placeholder="住址" name="address">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报修管理员</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gly" value="<?php echo $_SESSION['gly']?>" name="gly" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报修原因</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="reason" placeholder="报修原因"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>用户姓名</th>
                <th>报修账号</th>
                <th>手机号</th>
                <th>住址</th>
                <th>登记人</th>
                <th>报修详情</th>
                <th>是否已处理</th>
                <th>处理详情</th>
                <th>删除</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['account'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['gly']?></td>
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
                                    <div class="col-md-2 la"><label>报修的管理员</label></div>
                                    <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $row['gly']?>" disabled></div>
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

</body>
</html>
