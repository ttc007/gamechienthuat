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
                                // +'<h2 style="color:red;position:absolute;top:90px;left:200px" id="satthuonglenta6"></h2>'
                                +'</div>');
                           
                            $("#mainContentDiv").append('<div id="divTranhinhkedich" style="width:300px;position:absolute;top:200px;left:740px">'
                                // +'<h2 style="color:red;position:absolute;top:90px;left:20px" id="satthuonglendich6"></h2>'
                                +'</div>');
                            
                            for (var i = 1; i <=9; i++) {
                                $("#divTranhinhquyetchien").append("<button id='vitriBtn"+i+"' style='width:100px;height:100px;background:none' class='square'></button>");

                                $("#divTranhinhkedich").append("<button id='vitriKeDich"+i+"' style='width:100px;height:100px;background:none' class='square'></button>");

                                if(i==6) {
                                    $("#divTranhinhkedich").append('<h2 style="color:red;position:absolute;top:90px;left:20px" id="satthuonglendich6"></h2></div>');

                                    $("#divTranhinhquyetchien").append('<h2 style="color:red;position:absolute;top:90px;left:200px" id="satthuonglenta6"></h2></div>');
                                }
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
                                                $("#vitriKeDich"+vitri1).append(
                                                    // "<img src='image/kiemsi9.gif' style='width:100%;height:100%'>"
                                                    v.name
                                                    );
        
                                            }
                                        });
                                    },
                            });
                            $.ajax({
                                    url:'../api/'+{{$nhanvat->id}}+'/votuongs',
                                    type: "GET",
                                    success: function(data){
                                        $.each(data, function(i,v){
                                            if(v.vitri>0){
                                                $("#vitriBtn"+v.vitri).append(
                                                    // "<img src='image/kiemsi8.gif' style='width:100%;height:100%'>"
                                                    v.name
                                                    );
                                            }
                                        });
                                    },
                            });

                            $.ajax({
                                    url:'../api/'+{{$nhanvat->id}}+'/'+kedich_id+'/quyetchien',
                                    type: "GET",
                                    success: function(data){
                                        console.log(data);
                                        loadtranhinh(data.nhanvatVotuongs,data.kedichVotuongs);
                                    },
                            });

                            

                        }
                        function timmuctieu(vitri, kedichs)
                        {
                            var trave = 0;
                            if(vitri==4||vitri==5||vitri==6){

                                $.each(kedichs, function(i,v){
                                    // alert(vitri+',tt:' +v.trangthai +'vt'+v.vitri);
                                    if(v.trangthai==1&&v.vitri==3) trave=i;
                                    if(v.trangthai==1&&v.vitri==9) trave=i;
                                    if((v.trangthai==1&&v.vitri==6)) {trave=i}
                                });
                            }
                            // alert(trave);
                            return trave;
                        }

                        function tancong(nhanvats,kedichs,index){
                            if(index<nhanvats.length){
                                setTimeout(function(){ 
                                        v = nhanvats[index];
                                    // $.each(nhanvats, function(i , v) {
                                        if(v.trangthai==1){
                                            var muctieu = timmuctieu(v.vitri, kedichs);
                                            var st = v.tancong-kedichs[muctieu].phongthu;
                                            $("#satthuonglendich"+kedichs[muctieu].vitri).append('-'+st);
                                            setTimeout(function(){
                                            $("#satthuonglendich"+kedichs[muctieu].vitri).empty()}, 500);
                                            kedichs[muctieu].binhluc -= st;
                                            index++;
                                            tancong(nhanvats,kedichs,index);
                                        }
                                }, 1000);
                                
                            } else {
                                dichtradon(nhanvats,kedichs,0);
                            }
                        }
                        function dichtradon(nhanvats,kedichs,index){
                            if(index<kedichs.length){
                                setTimeout(function(){ 
                                        v = kedichs[index];
                                    // $.each(nhanvats, function(i , v) {
                                        if(v.trangthai==1){
                                            var muctieu = timmuctieu(v.vitri, nhanvats);
                                            var st = v.tancong-nhanvats[muctieu].phongthu;
                                            $("#satthuonglenta"+nhanvats[muctieu].vitri).append('-'+st);
                                            setTimeout(function(){
                                            $("#satthuonglenta"+nhanvats[muctieu].vitri).empty()}, 500);
                                            nhanvats[muctieu].binhluc -= st;
                                            index++;
                                            dichtradon(nhanvats,kedichs,index);
                                        }
                                }, 1000);
                                
                            } else {
                                tancong(nhanvats,kedichs,0);
                            }
                        }
                        function loadtranhinh(nhanvats,kedichs)
                        {
                            tancong(nhanvats,kedichs,0);
                        }
                        function loadtranhinh2(nhanvats,kedichs)
                        {
                            var st = kedich.tancong-nhanvat.phongthu;
                            setTimeout(function(){ 
                                $("#satthuonglenta").append('-'+ st);
                                    setTimeout(function(){$("#satthuonglenta").empty()}, 500);
                                    nhanvat.binhluc-= st;
                                    if (nhanvat.binhluc<=0) alert('Bạn đã thất bại');
                                    else loadtranhinh(nhanvat,kedich);
                            }, 1000);
                            
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