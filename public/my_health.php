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
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>健康监控</h1>
                    </div>
                    <div class="col-lg-12"style="height: 3rem;">

                    </div>
                </div>
            </div>



            <div class="col-lg-12">
                <div class="smart-widget widget-dark-blue">
                    <div class="smart-widget-header">
                        体重监控
                        <span class="smart-widget-option">
										<span class="refresh-icon-animated">
											<i class="fa fa-circle-o-notch fa-spin"></i>
										</span>

			                        </span>
                    </div>
                    <div class="col-md-8">
                        <div id="weight_detection" style="width: 60rem; height: 30rem; -webkit-tap-highlight-color: transparent; -webkit-user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1491806865244"><div style="position: relative; overflow: hidden; width: 720px; height: 360px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="720" height="360" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 720px; height: 360px; -webkit-user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border: 0px solid rgb(51, 51, 51); white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1), top 0.4s cubic-bezier(0.23, 1, 0.32, 1); border-radius: 4px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; font-family: 'Microsoft YaHei'; line-height: 21px; padding: 5px; left: 361px; top: 225px; background-color: rgba(50, 50, 50, 0.701961);">03-07
                                1995<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#c23531"></span>体重/kg : 63</div></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="col-sm-12" style="height: 3rem;"></div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="weight" placeholder="请输入你的体重/kg">
                            </div><!-- /form-group -->
                            <div class="col-sm-3">
                                <div class="col-lg-3">
                                    <button id="submit" class="btn btn-success btn-sm">确定</button>
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                        </div>
                        <div class="col-lg-8" style="height: 3rem;"></div>
                        <div class="col-sm-12">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        体重与身高的关系
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    男生：标准体重=（身高-100）×0.90<br>
                                    女生：标准体重=（身高-105）×0.92<br>
                                    当实际体重大于标准体重的10%～20%为过重<br>
                                    大于标准体重20%以上为肥胖<br>
                                    小于标准体重10%～20%为瘦<br>
                                    小于标准体重20%以上为严重消瘦
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- ./smart-widget -->
            </div>


            <div class="col-lg-12">
                <div class="smart-widget widget-dark-blue">
                    <div class="smart-widget-header">
                        睡眠监控
                        <span class="smart-widget-option">
										<span class="refresh-icon-animated">
											<i class="fa fa-circle-o-notch fa-spin"></i>
										</span>

			                        </span>
                    </div>
                    <div class="col-sm-12">
                        <div id="sleeping_detection" style="width: 100%; height: 30rem;" ></div>
                    </div>
                </div><!-- ./smart-widget -->
            </div>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
<?php include "middle.html";?>
    /*此处写js代码*/

    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例


        $.ajax("/api/user/"+id+"/weight_record/", {
            type: 'GET',
            datatype: 'json',
            success: function (result) {
                wd=JSON.parse(result);
                data=[];
                for(i=0;i<wd.length;i++){
                    data.push([wd[i].publish_date,wd[i].weight]);
                }
                myChart = echarts.init(document.getElementById("weight_detection"));
                option = {
                    title: {
                        text: '体重变化'
                    },
                    tooltip: {
                        trigger: 'axis',
                    },
                    xAxis: {
                        name: 'date',
                        type: 'time',
                        splitLine: {
                            show: true
                        }
                    },
                    yAxis: {
                        name: 'weight',
                        boundaryGap: [0, '100%'],
                        min: 'datamin',
                        type: 'value',
                        splitLine: {
                            show: true
                        }
                    },
                    series: [{
                        name: '体重/kg',
                        type: 'line',
                        showSymbol: false,
                        hoverAnimation: false,
                        data: data
                    }]
                };
                // 使用刚指定的配置项和数据显示图表。
                myChart.setOption(option);
            }
        });

        myChart = echarts.init(document.getElementById("sleeping_detection"));

        fdata=[];
        ddata=[];
        $.ajax("/api/user/"+id+"/sleep_record/", {
            type: 'GET',
            async:false,
            datatype: 'json',
            success: function (result) {
                data=JSON.parse(result);
                for(i=0;i<data.length;i++){
                    fdata.push([data[i].publish_date,data[i].full_sleep]);
                    ddata.push([data[i].publish_date,data[i].deep_sleep]);
                }
            }
        });

        option = {
            title: {
                text: '深度睡眠/总睡眠'
            },
            tooltip: {
                trigger: 'axis',
            },
            xAxis: {
                name: '日期',
                type: 'time',
                splitLine: {
                    show: true
                }
            },
            yAxis: {
                name: '分钟',
                boundaryGap: [0, '1%'],
                type: 'value',
                splitLine: {
                    show: true
                }
            },
            series: [
                {
                    name: '总睡眠',
                    type: 'line',
                    smooth: true,
                    data: fdata
                },
                {
                    name: '深度睡眠',
                    type: 'line',
                    smooth: true,
                    data: ddata
                }
            ]
        };

        myChart.setOption(option);



        $("#submit").on("click",function () {
            we=$("#weight").val();
            if(!(we>0)){
                return;
            }
            id=$("#id").text();
            var date = new Date();
            var mon = date.getMonth() + 1;
            var day = date.getDate();
            var nowDay = date.getFullYear() + "-" + (mon<10?"0"+mon:mon) + "-" +(day<10?"0"+day:day);
            var val={
                publish_date:nowDay,
                weight:we
            };
            $.ajax("/api/user/"+id+"/weight_record/", {
                type: 'POST',
                data: val,
                datatype:'json',
                success: function (result) {
                    window.location.href="my_health.php";
                }
            });
        });



    </script>

<?php include "end.html";?>