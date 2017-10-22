function loadchien()
                        {
                            $("#mainContentDiv").empty();
                            $(".thanh-chien-khuvuc").removeClass('active');
                            $("#chienBtn").addClass('active');
                            $("#mainContentDiv").append("<a onclick='quyetchiendangtrong()'>Quyết chiến Đàng Trong</a>");
                        }

                        function quyetchiendangtrong()
                        {
                            $("#mainContentDiv").empty();
                            $("#mainContentDiv").append("<a onclick='quyetchien()'>Giặc cỏ</a>");
                        }

                        function quyetchien()
                        {
                            // $("#mainContentDiv").empty();
                            $("#mainContentDiv").append('<div id="divTranhinhquyetchien" style="width:300px;position:absolute;top:200px;left:240px"></div>');
                            $.ajax({
                                url:'../api/'+{{$nhanvat->id}}+'/tranhinhs/0',
                                type: "GET",
                                success: function(data){
                                    // console.log(data);
                                    for (var i = 1; i <=9; i++) {
                                        if (data.vitri.search(i)>=0)
                                            $("#divTranhinhquyetchien").append("<button id='vitriBtn"+i+"' style='width:100px;height:100px;background:#3a616b' class='square'></button>");
                                        else 
                                            $("#divTranhinhquyetchien").append("<button style='width:100px;height:100px;background:#17292c' disabled class='square' ></button>");
                                    }
                                },
                                error: function(data){
                                    alert("error");
                                }
                            });
                            
                            $("#mainContentDiv").append("");
                        }

                        function tranhinh()
                        {
                            $("#divContent").empty();
                            $("#divContent").append('<div style="border: 2px solid #080e0f;height: 370px;width: 200px;float:left">'
                                            +'<h3>*Danh sách trận hình</h3>'
                                            +'<div id="listTranhinh">'
                                            +'</div>'
                                        +'</div>');
                            $("#divContent").append('<div style="border: 2px solid #080e0f;height: 370px;width: 320px;float:right">'
                                            +'<div id="tranhinhsd">'
                                            +'</div>'
                                        +'</div>');
                            $.ajax({
                                url:'../api/'+{{$nhanvat->id}}+'/tranhinhs',
                                type: "GET",
                                // data:{'name': $("#inpuTenNV").val()},
                                success: function(data){
                                    console.log(data);
                                    $.each(data, function(i,v){
                                        $("#listTranhinh").empty();
                                        if (v.active==1) {
                                            $("#listTranhinh").append("<h4><a>+"+v.name+"</a> - Đanng sử dụng</h4>");
                                            $("#tranhinhsd").append("<h3>"+v.name+"</h3>");
                                            for (var i = 1; i <=9; i++) {
                                                if (v.vitri.search(i)>=0)
                                                    $("#tranhinhsd").append("<button id='vitriBtn"+i+"' style='width:100px;height:100px;background:#3a616b' class='square'></button>");
                                                else 
                                                    $("#tranhinhsd").append("<button style='width:100px;height:100px;background:#17292c' disabled class='square' ></button>");
                                            }
                                        } else {
                                            $("#listTranhinh").append("<h4><a>+"+v.name+"</a></h4>");
                                        }
                                    });
                                },
                                error: function(data){
                                    alert("error");
                                }
                            });
                            $.ajax({
                                    url:'../api/'+{{$nhanvat->id}}+'/votuongs',
                                    type: "GET",
                                    success: function(data){
                                        // console.log(data);
                                        $.each(data, function(i,v){
                                            if(v.vitri>0){
                                                // alert(v.vitri);
                                                $("#vitriBtn"+v.vitri).append(v.name);
                                            }
                                        });
                                    },
                                    error: function(data){
                                        alert("error");
                                    }
                            });
                        }

                        function tatlisvt()
                        {
                            $("#divlistVotuong").css("display",'none');
                        }
                        function loadvotuong()
                        {
                            $("#divlistVotuong").css("display",'block');
                            $("#divContent").empty();
                            $("#divContent").append('<div style="border: 2px solid #080e0f;height: 370px;width: 200px">'
                                            +'<h3>*Hệ thông võ hồn</h3>'
                                            +'<h3>*Danh sách tướng</h3>'
                                            +'<div id="listVotuong">'
                                            +'</div>'
                                        +'</div>');
                            $.ajax({
                                url:'../api/'+{{$nhanvat->id}}+'/votuongs',
                                type: "GET",
                                // data:{'name': $("#inpuTenNV").val()},
                                success: function(data){
                                    console.log(data);
                                    $.each(data, function(i,v){
                                        $("#listVotuong").empty();
                                        $("#listVotuong").append("<h4><a>+"+v.name+"</a></h4>")
                                    });
                                },
                                error: function(data){
                                    alert("error");
                                }
                            })
                        }