<script>
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
                            $("#mainContentDiv").append("<a onclick='quyetchien(6)'>Giặc cỏ</a>");
                        }

                        function quyetchien(kedich_id)
                        {
                            $("#mainContentDiv").empty();
                            $("#mainContentDiv").append('<div id="divTranhinhquyetchien" style="width:300px;position:absolute;top:200px;left:240px">'
                                +'<h2 style="color:red;position:absolute;top:90px;left:200px" id="satthuonglenta"></h2></div>');
                           
                            $("#mainContentDiv").append('<div id="divTranhinhkedich" style="width:300px;position:absolute;top:200px;left:740px">'
                                +'<h2 style="color:red;position:absolute;top:90px;left:20px" id="satthuonglendich"></h2></div>');
                            
                            for (var i = 1; i <=9; i++) {
                                $("#divTranhinhquyetchien").append("<button id='vitriBtn"+i+"' style='width:100px;height:100px;background:none' class='square'></button>");
                            }
                            $.ajax({
                                    url:'../api/'+kedich_id+'/votuongs',
                                    type: "GET",
                                    success: function(data){
                                        // console.log(data);
                                        $.each(data, function(i,v){
                                            if(v.vitri>0){
                                                var vitri1=v.vitri;
                                                if (v.vitri == 4 ) vitri1=6;
                                                if (v.vitri == 6 ) vitri1=4;
                                                if (v.vitri == 1 ) vitri1=3;
                                                if (v.vitri == 3 ) vitri1=1;
                                                if (v.vitri == 9 ) vitri1=7;
                                                if (v.vitri == 7 ) vitri1=9;
                                                $("#vitriKeDich"+vitri1).append("<img src='image/kiemsi9.gif' style='width:100%;height:100%'>");
        
                                            }
                                        });
                                    },
                                    error: function(data){
                                        alert();
                                    }
                            });
                            $.ajax({
                                    url:'../api/'+{{$nhanvat->id}}+'/votuongs',
                                    type: "GET",
                                    success: function(data){
                                        // console.log(data);
                                        $.each(data, function(i,v){
                                            if(v.vitri>0){
                                                $("#vitriBtn"+v.vitri).append("<img src='image/kiemsi8.gif' style='width:100%;height:100%'>");
                                                // $("#vitriBtn"+v.vitri).css('background','#3a616b');
                                                $("#divTranhinhquyetchien").append("<input type='hidden' id='binhluc2' value='"+v.binhluc+"'>");
                                            }
                                        });
                                    },
                                    error: function(data){
                                        alert("error");
                                    }
                            });

                            for (var i = 1; i <=9; i++) {
                                $("#divTranhinhkedich").append("<button id='vitriKeDich"+i+"' style='width:100px;height:100px;background:none' class='square'></button>");
                            }

                            loadtranhinh(-52);

                        }

                        function loadtranhinh(satthuonglendich)
                        {
                            setTimeout(function(){ 
                                $("#satthuonglendich").append(satthuonglendich);
                                    setTimeout(function(){
                                        $("#satthuonglendich").empty()}, 500);
                                        loadtranhinh2(-32);
                            }, 2000);
                            
                        }
                        function loadtranhinh2(satthuonglenta)
                        {
                            setTimeout(function(){ 
                                $("#satthuonglenta").append(satthuonglenta);
                                    setTimeout(function(){$("#satthuonglenta").empty()}, 500);
                                    loadtranhinh(-52);
                            }, 2000);
                            
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

</script>