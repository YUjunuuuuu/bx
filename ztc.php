

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>转套餐</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/jquery.min.js" type="text/css"></script>
    <script type="text/javascript">

            $(document).ready(function(){
                $("#button2").click(function(){
//var chk_String = 'send='+ chk_send + '&key='+ value;
                    $("#one").remove();
                    var chk_String = $("#name").val();
                    var cx3="{\"code\":\"085\" , \"account\" : \""+chk_String+"\" , \"realtime_flag\" : \"1\" }";
                    $.ajax({
                        type: "POST",
                        url: "ztc2.php",
                        async: false,

                        data: {jsy:cx3},
                        dataType:"json",
                        success: function(msg) {

                            var data = '';
                            if (msg != '') {
                                data = eval("(" + msg + ")");    //将返回的json数据进行解析，并赋给data
                            }
                            var text1 = "<div id=\"one\">\n" + "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">姓名</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"name1\" name=\"name\" value=\"" + data.list[0].name + "\" disabled>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputPassword3\" class=\"col-sm-2 control-label\">账号</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"account\"  name=\"account\" value=\"" + data.list[0].account + "\" disabled>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">手机号码</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"mobile\" value=\"" + data.list[0].phone1 + "\" name=\"mobile\">\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">住址</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"address\" value=\"" + data.list[0].install_address + "\" name=\"address\">\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">身份证</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"sf\" value=\"" + data.list[0].id_number + "\" name=\"sf\" disabled>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">余额</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"ye\" value=\"" + data.list[0].balance + "\" name=\"ye\" disabled>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">套餐组</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"tc\" value=\"" + data.list[0].package_group_id + "\" name=\"tc\" disabled>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">状态</label>\n" +
                                "    <div class=\"col-sm-10\">\n" +
                                "        <input type=\"text\" class=\"form-control\" id=\"zt\" value=\"" + data.list[0].user_state + "\" name=\"zt\" disabled>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "\n" +
                                "<div class=\"form-group\">\n" +
                                "    <div class=\"col-sm-offset-2 col-sm-10\">\n" +
                                "        <button type=\"submit\" id=\"button1\" class=\"btn btn-default\">提交</button>\n" +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">想要转的套餐</label>\n" +
                                "    <div class=\" col-sm-5\">\n" +
                                "      <select id=\"odd\" class=\"form-control\">\n" +
                                "  <option value=\"8\">计时普通套餐(8)</option>\n" +
                                "  <option value=\"11\">计时六折套餐(11)</option>\n" +
                                "</select>  " +
                                "    </div>\n" +
                                "</div>\n" +
                                "<div class=\"form-group\">\n" +
                                "    <div class=\"col-sm-offset-2 col-sm-10\">\n" +
                                "        <button type=\"submit\" id=\"button3\" class=\"btn btn-primary\">提交</button>\n" +
                                "    </div>\n" +
                                "</div>\n" + "</div>\n";

                            //控制台输出

                            $("#pi").append(text1);

                        }})
                            $("#button1").click(function(){
                                var account=$("#account").val();
                                var phone1=$("#mobile").val();
                                console.log(phone1);
                                var address=$("#address").val();
                                var d=new Date();
                                var jsy1="{\"code\":\"002\" ,\"account\":\""+account+"\",\"serial_number\":\""+ d.getTime() +"\" ,\"phone1\":\""+phone1+"\",\"install_address\":\""+address+"\"}";
                                $.ajax({
                                    type: "POST",
                                    url: "ztc2.php",
                                    async: false,

                                    data: {jsy:jsy1},
                                    dataType:"json",
                                    success: function(msg){
                                        alert("修改成功");
                                        $.ajax({
                                            type: "POST",
                                            url: "ztc2.php",
                                            async: false,

                                            data: {jsy:cx3},
                                            dataType:"json",
                                            success: function(msg1){
                                                var data9 = '';
                                                if (msg1 != '') {
                                                    data9 = eval("(" + msg + ")");    //将返回的json数据进行解析，并赋给data
                                                    $("#mobile").val(data9.list[0].phone1)；
                                                    $("#address").val(data9.list[0].install_address)；
                                                }
                                            }})
                                    }})//1
                            });


                            $("#button3").click(function(){
                                var zt=$("#zt").val();
                                var account=$("#account").val();
                                var d=new Date();
                                var valztzd;
                                var valqf;
                                var xgpwd="{\"code\":\"002\" ,\"account\":\""+account+"\",\"password\":\"112233\" ,\"serial_number\":\""+d.getTime()+"\"}";
                                var ztzd="{\"code\":\"090\" , \"account\" : \""+account+"\" }";
                                if(zt!=0){
                                    $.ajax({
                                        type: "POST",
                                        url: "ztc2.php",
                                        async: false,

                                        data: {jsy:xgpwd},
                                        dataType:"json",
                                        success: function(da){
                                            var dat='';
                                            if(da!=''){
                                                dat = eval("("+da+")");    //将返回的json数据进行解析，并赋给data
                                            }
                                            if(dat.result=="E00")
                                            {


                                                var lx="{\"code\":\"014\" ,\"account\":\""+account+"\",\"serial_number\":\""+d.getTime()+"\" }";
                                                $.ajax({
                                                    type: "POST",
                                                    url: "ztc2.php",
                                                    async: false,

                                                    data: {jsy:lx},
                                                    dataType:"json",
                                                    success: function(msg){
                                                       var dat1='';
                                                       if(msg!=''){
                                                           dat1=eval("("+msg+")");
                                                       }
                                                       if(dat1.result=="E00"){

                                                           var tc=$("#odd").val();

                                                           var gtc="{\"code\":\"006\" ,\"account\":\""+account+"\" ,\"package_group_id\":\""+tc+"\" ,\"amount\":\"0\" ,\"serial_number\":\""+d.getTime()+"\" }";
                                                           $.ajax({
                                                               type: "POST",
                                                               url: "ztc2.php",
                                                               async: false,

                                                               data: {jsy:gtc},
                                                               dataType:"json",
                                                               success: function(msg){
                                                                   var dat1='';
                                                                   if(msg!=''){
                                                                       dat1=eval("("+msg+")");
                                                                   }
                                                                   if(dat1.result=="E00"){
                                                                       alert("修改成功！");
                                                                   }

                                                               }});
                                                       }

                                                    }});
                                            }

                                        }});
                                }
                                else{
                                    $.ajax({
                                        type: "POST",
                                        url: "ztc2.php",
                                        async: false,

                                        data: {jsy:ztzd},
                                        dataType:"json",
                                        success: function(msg){
                                            var data='';
                                            if(msg!=''){
                                                data = eval("("+msg+")");    //将返回的json数据进行解析，并赋给data
                                            }
                                            if(data.result=="E00") {
                                                valztzd = data.list[0].use_money;
                                                var lsqf="{\"code\":\"089\" , \"account\" : \""+account+"\" }";
                                                $.ajax({
                                                    type: "POST",
                                                    url: "ztc2.php",
                                                    async: false,

                                                    data: {jsy:lsqf},
                                                    dataType:"json",
                                                    success: function(msg){
                                                        var data='';
                                                        if(msg!=''){
                                                            data = eval("("+msg+")");    //将返回的json数据进行解析，并赋给data
                                                        }
                                                        if(data.result=="E00"){
                                                            valqf=data.list[0].total_arrears;
                                                            var amount1=valztzd+valqf-$("#ye").val();
                                                            var xh1="{\"code\":\"007\" ,\"account\":\""+account+"\" ,\"amount\":\""+amount1+"\" ,\"serial_number\":\""+d.getTime()+"\" }";
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "ztc2.php",
                                                                async: false,

                                                                data: {jsy:xh1},
                                                                dataType:"json",
                                                                success: function(msg){
                                                                    var data='';
                                                                    if(msg!=''){
                                                                        data = eval("("+msg+")");    //将返回的json数据进行解析，并赋给data
                                                                    }
                                                                    if(data.result=="E00"){
                                                                        var tcz=$("#odd").val();
                                                                        var name=$("#name1").val();
                                                                        var phone1=$("#mobile").val();
                                                                        var id_number=$("#sf").val();
                                                                        var address=$("#address").val();
                                                                        var kh2="{\"code\":\"001\" ,\"account\":\""+account+"\" ,\"password\":\"112233\" ,\"package_group_id\":\""+tcz+"\" ,\"serial_number\":\""+d.getTime()+"\" ,\"name\":\""+name+"\" ,\"phone1\":\""+phone1+"\",\"id_number\":\""+id_number+"\",\"install_address\":\""+address+"\"}";
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: "ztc2.php",
                                                                            async: false,

                                                                            data: {jsy:kh2},
                                                                            dataType:"json",
                                                                            success: function(msg){
                                                                                var data='';
                                                                                if(msg!=''){
                                                                                    data = eval("("+msg+")");    //将返回的json数据进行解析，并赋给data
                                                                                }
                                                                                if(data.result=="E00"){
                                                                                    var amount=$("#ye").val();
                                                                                    var xz2="{\"code\":\"012\" ,\"account\":\""+account+"\" ,\"amount\":\""+amount+"\" ,\"serial_number\":\""+d.getTime()+"\" }";
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url: "ztc2.php",
                                                                                        async: false,

                                                                                        data: {jsy:xz2},
                                                                                        dataType:"json",
                                                                                        success: function(msg){
                                                                                            alert("修改成功");

                                                                                        }});
                                                                                }

                                                                            }});
                                                                    }

                                                                }});
                                                        }

                                                    }});
                                            }

                                        }});
                                }
                            })




                })//1



        });
    </script>
    <style type="text/css">
        .an{
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="col-sm-9  col-md-10  main">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">用户账号</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="name" placeholder="用户账号" name="account">
        </div>
    </div>
    <div class="form-group" id="pi">
        <div class="col-sm-offset-2 col-sm-10 an">
            <button type="button" id="button2" class="btn btn-info">查询</button>
        </div>
    </div>
</div>
</body>
</html>