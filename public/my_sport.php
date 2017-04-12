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
                    <h1>运动管理</h1>
                </div>
                <div class="col-lg-12"style="height: 3rem;">

                </div>
            </div>
        </div>

        <div class="row m-top-md">


            <div class="col-sm-3 col-sms-6">
                <div class="widget-stat3 bg-info">
                    <div class="widget-stat-icon">
                        <i class="fa fa-road fa-3x"></i>
                    </div>
                    <div class="text-upper">运动总距离</div>
                    <div class="text-center" id="t_miles"></div>
                </div>
            </div>

            <div class="col-sm-3 col-sm-6s">
                <div class="widget-stat3 bg-primary">
                    <div class="widget-stat-icon">
                        <i class="fa fa-clock-o fa-3x"></i>
                    </div>
                    <div class="text-upper">运动总天数</div>
                    <div class="text-center" id="t_days"></div>
                </div>
            </div>

            <div class="col-sm-3 col-sm-6s">
                <div class="widget-stat3 bg-danger">
                    <div class="widget-stat-icon">
                        <i class="fa fa-fire fa-3x"></i>
                    </div>
                    <div class="text-upper">燃烧卡路里</div>
                    <div class="text-center" id="t_calorie"></div>
                </div>
            </div><!-- ./col -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="smart-widget widget-dark-blue">
                        <div class="smart-widget-header">
                            本周运动情况
                            <span class="smart-widget-option">
										<span class="refresh-icon-animated">
											<i class="fa fa-circle-o-notch fa-spin"></i>
										</span>
			                        </span>
                        </div>
                    </div><!-- ./smart-widget -->
                </div><!-- ./col -->
            </div>

            <div class="col-sm-3 col-sms-6">
                <div class="widget-stat3 bg-info">
                    <div class="widget-stat-icon">
                        <i class="fa fa-road fa-3x"></i>
                    </div>
                    <div class="text-upper">本周运动总距离</div>
                    <div class="text-center" id="w_miles"></div>
                </div>
            </div>

            <div class="col-sm-3 col-sm-6s">
                <div class="widget-stat3 bg-primary">
                    <div class="widget-stat-icon">
                        <i class="fa fa-male fa-3x"></i>
                    </div>
                    <div class="text-upper">本周运动总步数</div>
                    <div class="text-center" id="w_steps"></div>
                </div>
            </div><!-- ./col -->

            <div class="col-sm-3 col-sm-6s">
                <div class="widget-stat3 bg-danger">
                    <div class="widget-stat-icon">
                        <i class="fa fa-fire fa-3x"></i>
                    </div>
                    <div class="text-upper">本周燃烧卡路里</div>
                    <div class="text-center" id="w_calorie"></div>
                </div>
            </div><!-- ./col -->

            <div class="col-md-4">
                <div id="target" style="width:30rem;height:30rem;"></div>
            </div>

            <div class="col-sm-8">
                <div class="col-sm-8">
                    <div class="col-lg-12" style="height: 5rem;"></div>
                    <div class="col-sm-5">
                        <h1>设置目标</h1>
                    </div>
                    <h1 class="col-sm-7" id="oldtarget">
                        40千米
                    </h1>
                    <div class="col-lg-12" style="height: 3rem;"></div>
                    <div class="col-sm-7">
                        <input class="form-control" placeholder="新的目标" id="newtarget" type="number" autofocus="">
                    </div><!-- /form-group -->
                    <div class="col-sm-3">
                        <div class="col-lg-3">
                            <button id="submit" class="btn btn-success btn-sm">设置</button>
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="smart-widget widget-dark-blue">
                    <div class="smart-widget-header">
                        每天行走步数
                        <span class="smart-widget-option">
										<span class="refresh-icon-animated">
											<i class="fa fa-circle-o-notch fa-spin"></i>
										</span>

			                        </span>
                    </div>
                    <div id="steps_chart" style="height:25rem;">

                    </div><!-- ./smart-widget-inner -->
                </div><!-- ./smart-widget -->
            </div><!-- ./col -->
        </div>
    </div><!-- ./padding-md -->
</div><!-- /main-container -->
<?php include "middle.html";?>
/*此处写js代码*/

<script type="text/javascript">


    $.ajax("/api/user/"+id+"/sport_record_total", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data=JSON.parse(result);
            $("#t_miles").html((data.t_miles||'0')+"千米");
            $("#t_calorie").html((data.t_calorie||'0')+"大卡");
        }
    });
    $.ajax("/api/user/"+id+"/sport_days", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data=JSON.parse(result);
            $("#t_days").html((data.t_days||'0')+"天");
        }
    });
    var weekly_miles=0;
    $.ajax("/api/user/"+id+"/sport_record_weekly", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data=JSON.parse(result);
            weekly_miles=data.w_miles;
            if(weekly_miles==null){
                weekly_miles=100;
            }
            $("#w_steps").html((data.w_steps||'0')+"步");
            $("#w_miles").html((data.w_miles||'0')+"千米");
            $("#w_calorie").html((data.w_calorie||'0')+"大卡");
        }
    });

    var weekly_goal;
    $.ajax("/api/user/"+id+"/weekly_goal", {
        type: 'GET',
        async:false,
        datatype: 'json',
        success: function (result) {
            data=JSON.parse(result);
            weekly_goal=data.goal;
            $("#oldtarget").html((data.goal||'1')+"千米");
        }
    });
    var start;
    var end;

    $.ajax("/api/user/"+id+"/sport_record/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            sd=JSON.parse(result);
            data=[];
            var dayTime = 3600 * 24 * 1000;
            end = +echarts.number.parseDate(sd[sd.length-1].publish_date);
            start = end-dayTime*270;
            for(i=0;i<sd.length;i++){
                data.push([sd[i].publish_date,sd[i].steps]);
            }

            // 基于准备好的dom，初始化echarts实例
            myChart = echarts.init(document.getElementById("steps_chart"));

            option = {
                backgroundColor: '#f5f5f5',

                title: {
                    top: 30,
                    text: '每天的步数',
                    left: 'center',
                    textStyle: {
                        color: '#000'
                    }
                },
                tooltip : {
                    trigger: 'item'
                },
                legend: {
                    top: '30',
                    left: '100',
                    data:['步数', 'Top 12'],
                    textStyle: {
                        color: '#000'
                    }
                },
                calendar: [{
                    top: 100,
                    left: 'center',
                    range: [start, end],
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#000',
                            width: 4,
                            type: 'solid'
                        }
                    },
                    yearLabel: {
                        formatter: '{start}  1st',
                        textStyle: {
                            color: '#000'
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: '#fdfff4',
                            borderWidth: 1,
                            borderColor: '#111'
                        }
                    }
                }],
                series : [
                    {
                        name: '步数',
                        type: 'scatter',
                        coordinateSystem: 'calendar',
                        data: data,
                        symbolSize: function (val) {
                            return val[1] / 1000;
                        },
                        itemStyle: {
                            normal: {
                                color: '#66ccff'
                            }
                        }
                    },
                    {
                        name: 'Top 12',
                        type: 'effectScatter',
                        coordinateSystem: 'calendar',
                        
                        data: data.sort(function (a, b) {
                            return b[1] - a[1];
                        }).slice(0, 12),
                        symbolSize: function (val) {
                            return val[1] / 1000;
                        },
                        showEffectOn: 'render',
                        rippleEffect: {
                            brushType: 'stroke'
                        },
                        hoverAnimation: true,
                        itemStyle: {
                            normal: {
                                color: '#48f400',
                                shadowBlur: 10,
                                shadowColor: '#333'
                            }
                        },
                        zlevel: 1
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        }
    });

    myChart = echarts.init(document.getElementById("target"));
    option = {
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['目标完成率']
        },
        series : [
            {
                type: 'pie',
                radius : ['50%', '75%'],
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data:[
                    {
                        value:weekly_miles, name:'目标完成率',
                        label: {
                            normal: {
                                formatter: '{d} %',
                                textStyle: {
                                    fontSize: 40
                                }
                            }
                        },
                        itemStyle: {
                            normal: {
                                color: '#690'
                            }
                        }
                    },
                    {
                        value:weekly_goal, name:'占位',
                        tooltip: {
                            show: true
                        },
                        itemStyle: {
                            normal: {
                                color: '#888'
                            }
                        },
                        label: {
                            normal: {
                                formatter: '\n目标完成率',
                                textStyle: {
                                    fontSize: 25
                                }
                            }
                        }
                    }
                ]
            }
        ]
    };
    myChart.setOption(option);


    $("#submit").on("click",function () {
        target=$("#newtarget").val();
        $.ajax("/api/user/"+id+"/weekly_goal", {
            type: 'POST',
            data:{goal:target},
            datatype: 'json',
            success: function (result) {
                window.location.href="my_sport.php";
            }
        });
    });

</script>

<?php include "end.html";?>/