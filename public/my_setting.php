<?php
/**
 * Created by IntelliJ IDEA.
 * User: baiguofeng
 * Date: 2017/4/10
 * Time: 20:34
 */

    session_start();

    //检测是否登录，若没登录则转向登录界面
    if(!isset($_SESSION['id'])){
        header("Location:index.html");
        exit();
    }
?>
    <?php include "head.html";?>

    <div class="main-container">
        <div class="padding-md">
            <h3 class="header-text m-bottom-md">
                我的设定

            </h3>


            <div class="col-md-12">

                <form class="form-horizontal m-top-md">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">旧密码&ensp;&ensp;&ensp;&ensp;</label>
                        <div class="col-sm-9">
                            <input name="ops" id="ops" type="password" class="form-control"
                                   value=""  style="width: 60%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">新密码&ensp;&ensp;&ensp;&ensp;</label>
                        <div class="col-sm-9">
                            <input name="nps" id="nps" type="password" class="form-control"
                                   value=""  style="width: 60%">
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">确认密码&ensp;&ensp;</label>
                        <div class="col-sm-9">
                            <input name="nnps" id="nnps" type="password" class="form-control"
                                   value="" style="width: 60%" >
                        </div>
                    </div>



                    <div class="form-group m-top-lg">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <button class="btn btn-info m-left-xs" id="submit">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- ./padding-md -->
    <?php include "middle.html";?>
    <script>


        $("#submit").on("click",function () {
            ops=$("#ops").val();
            nps=$("#nps").val();
            nnps=$("#nnps").val();
            if(ops==""||nps==""||nnps==""){
                alert("密码不能为空");
                return;
            }
            if(nps!=nnps){
                alert("两次输入密码不一致");
                return;
            }

            val={
                old_password:ops,
                new_password:nps
            };
            $.ajax("/api/user/"+id+"/password", {
                type: 'PUT',
                async:false,
                data:val,
                success: function (result) {
                    data=JSON.parse(result);
                    if(data.status=="ok"){
                        alert("更改成功");
                        window.location.href="my_setting.php";
                    }else{
                        alert("旧密码不正确");
                    }
                }
            });

        });
    </script>

    <?php include "end.html";?>