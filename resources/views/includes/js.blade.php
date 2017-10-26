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
                            }

                            $("#divTranhinhkedich").append('<h2 style="color:red;position:absolute;top:90px;left:20px" id="satthuonglendich6"></h2></div>');
                            $("#divTranhinhkedich").append('<h2 style="color:red;position:absolute;top:90px;left:120px" id="satthuonglendich5"></h2></div>');

                            $("#divTranhinhquyetchien").append('<h2 style="color:red;position:absolute;top:90px;left:200px" id="satthuonglenta6"></h2></div>');
                            $("#divTranhinhquyetchien").append('<h2 style="color:red;position:absolute;top:90px;left:100px" id="satthuonglenta5"></h2></div>');
                            $.ajax({
                                    url:'../api/'+kedich_id+'/votuongs',
                                    type: "GET",
                                    success: function(data){
                                        console.log(data);
                                        $.each(data, function(i,v){
                                            if(v.vitri>0){
                                                $("#vitriKeDich"+hdvtthkd(v.vitri)).append(
                                                    "<h4 style='color:#ec55cc'>"+v.name+"</h4><p style='font-size:8px;color:#fff'>Binh lực tối đa:"+v.binhluc+"</p>"
                                                    );
        
                                            }
                                        });
                                    },
                            });
                            $.ajax({
                                    url:'../api/'+{{$nhanvat->id}}+'/votuongs',
                                    type: "GET",
                                    success: function(data){
                                        // console.log(data);
                                        $.each(data, function(i,v){
                                            if(v.vitri>0){
                                                $("#vitriBtn"+v.vitri).append(
                                                   "<h4 style='color:#e2f5cc'>" +v.name+"</h5><p style='font-size:8px;color:#fff'>Binh lực tối đa:"+v.binhluc+"</p>"
                                                    );
                                            }
                                        });
                                    },
                            });

                            $.ajax({
                                    url:'../api/'+{{$nhanvat->id}}+'/'+kedich_id+'/quyetchien',
                                    type: "GET",
                                    success: function(data){
                                        // console.log(data);
                                        // alert(data);
                                        loadtranhinh(data.nhanvatVotuongs,data.kedichVotuongs);
                                    },
                            });

                            

                        }
                         function hdvtthkd(vitri)
                         {
                            var vitri1=vitri;
                                                if (vitri == 4 ) vitri1=6;
                                                if (vitri == 6 ) vitri1=4;
                                                if (vitri == 1 ) vitri1=3;
                                                if (vitri == 3 ) vitri1=1;
                                                if (vitri == 9 ) vitri1=7;
                                                if (vitri == 7 ) vitri1=9;
                            return vitri1;
                         }
                        function timmuctieu(vitri, kedichs)
                        {
                            // return 0;
                            var trave = "win";
                            // var a = checkDie(6,kedichs);
                            // console.log(a);
                            if(vitri==4||vitri==5||vitri==6){
                                if(checkDie(6,kedichs)==1) trave = timIndex(6,kedichs);
                                    else if(checkDie(9,kedichs)==1) trave = timIndex(9,kedichs);
                                        else if(checkDie(3,kedichs)==1) trave = timIndex(3,kedichs);
                                            else if(checkDie(5,kedichs)==1) trave = timIndex(5,kedichs);
                                                else if(checkDie(8,kedichs)==1)trave =  timIndex(8,kedichs);
                                                    else if(checkDie(2,kedichs)==1)trave = timIndex(2,kedichs);
                                                        else if(checkDie(4,kedichs)==1)trave = timIndex(4,kedichs);
                                                            else if(checkDie(7,kedichs)==1)trave = timIndex(7,kedichs);
                                                                else if(checkDie(1,kedichs)==1)trave = timIndex(1,kedichs);
                            }
                            if(vitri==1||vitri==2||vitri==3){
                                if(checkDie(3,kedichs)==1) trave = timIndex(3,kedichs);
                                    else if(checkDie(6,kedichs)==1) trave = timIndex(6,kedichs);
                                        else if(checkDie(9,kedichs)==1) trave = timIndex(9,kedichs);
                                            else if(checkDie(2,kedichs)==1) trave = timIndex(2,kedichs);
                                                else if(checkDie(5,kedichs)==1) trave = timIndex(5,kedichs);
                                                    else if(checkDie(8,kedichs)==1) trave = timIndex(8,kedichs);
                                                        else if(checkDie(1,kedichs)==1) trave = timIndex(1,kedichs);
                                                            else if(checkDie(4,kedichs)==1) trave = timIndex(4,kedichs);
                                                                else if(checkDie(7,kedichs)==1) trave = timIndex(7,kedichs);
                            }
                            if(vitri==7||vitri==8||vitri==9){
                                if(checkDie(9,kedichs)==1) trave = timIndex(9,kedichs);
                                    else if(checkDie(3,kedichs)==1) trave = timIndex(3,kedichs);
                                        else if(checkDie(6,kedichs)==1) trave = timIndex(6,kedichs);
                                            else if(checkDie(8,kedichs)==1) trave = timIndex(8,kedichs);
                                                else if(checkDie(2,kedichs)==1) trave = timIndex(2,kedichs);
                                                    else if(checkDie(5,kedichs)==1) trave = timIndex(5,kedichs);
                                                        else if(checkDie(7,kedichs)==1) trave = timIndex(7,kedichs);
                                                            else if(checkDie(1,kedichs)==1) trave = timIndex(1,kedichs);
                                                                else if(checkDie(4,kedichs)==1) trave = timIndex(4,kedichs);
                            }
                            // alert(trave);
                            // console.log(trave);
                            return trave;
                        }
                        function timIndex(vitri,kedichs)
                        {
                            var index = "";
                            $.each(kedichs, function(i,v){
                                if(v.vitri==vitri) index=i;
                            });
                            return index;
                        }

                        function checkDie(vitri,kedichs)
                        {
                            var trave = 0;
                            $.each(kedichs, function(i,v){
                                // console.log(v.trangthai);
                                if(v.trangthai==1&&v.vitri==vitri) trave++;
                            });
                            return trave;
                        }
                        function tancong(nhanvats,kedichs,index){
                            if(index<nhanvats.length){

                                setTimeout(function(){ 
                                        v = nhanvats[index];
                                        if(v.trangthai==1){
                                            var muctieu = timmuctieu(v.vitri, kedichs);
                                            if(muctieu=='win') {alert('Chúc mừng bạn đã chiến thắng!'); location.reload();}
                                            else {
                                                var st = v.tancong-kedichs[muctieu].phongthu;
                                                kedichs[muctieu].binhluc -= st;
                                                if(kedichs[muctieu].binhluc <=0) kedichs[muctieu].trangthai = 0;
                                                $("#satthuonglendich"+kedichs[muctieu].vitri).append('-'+st);
                                                $("#vitriBtn"+v.vitri).css('background','red');
                                                $("#vitriKeDich"+hdvtthkd(kedichs[muctieu].vitri)+" h6").remove();
                                                $("#vitriKeDich"+hdvtthkd(kedichs[muctieu].vitri)).append("<h6 style='color:#79b6f2'>Binh luc:"+kedichs[muctieu].binhluc+"</h6>");
                                                setTimeout(function(){
                                                    $("#satthuonglendich"+kedichs[muctieu].vitri).empty();
                                                    $("#vitriBtn"+v.vitri).css('background','none');
                                                    if(kedichs[muctieu].binhluc <=0){
                                                        $("#vitriKeDich"+hdvtthkd(kedichs[muctieu].vitri)).append("<h2 style='color:red;position:absolute;top:100px'>Die</h2>");
                                                        $("#vitriKeDich"+hdvtthkd(kedichs[muctieu].vitri)).css('background','#999');
                                                    }
                                                }, 500);
                                            }
                                        }
                                        index++;
                                        tancong(nhanvats,kedichs,index);
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
                                            if(muctieu=='win'){ alert(' Rất tiếc bạn đã thua!');location.reload();}
                                            else {
                                                var st = v.tancong-nhanvats[muctieu].phongthu;
                                                nhanvats[muctieu].binhluc -= st;
                                                if(nhanvats[muctieu].binhluc <=0) nhanvats[muctieu].trangthai = 0;
                                                $("#satthuonglenta"+nhanvats[muctieu].vitri).append('-'+st);
                                                $("#vitriKeDich"+hdvtthkd(v.vitri)).css('background','red');
                                                $("#vitriBtn"+nhanvats[muctieu].vitri+" h6").remove();
                                                $("#vitriBtn"+nhanvats[muctieu].vitri).append("<h6 style='color:#79b6f2'>Binh luc:"+nhanvats[muctieu].binhluc+"</h6>");
                                                setTimeout(function(){
                                                    $("#satthuonglenta"+nhanvats[muctieu].vitri).empty();
                                                    $("#vitriKeDich"+hdvtthkd(v.vitri)).css('background','none');
                                                    if(nhanvats[muctieu].binhluc <=0){
                                                        $("#vitriBtn"+nhanvats[muctieu].vitri).append("<h2 style='color:red;position:absolute;top:100px'>Die</h2>");
                                                        $("#vitriBtn"+nhanvats[muctieu].vitri).css('background','#999');
                                                    }
                                                }, 500);
                                            }
                                        }
                                        index++;
                                        dichtradon(nhanvats,kedichs,index);
                                }, 1000);
                                
                            } else {
                                tancong(nhanvats,kedichs,0);
                            }
                        }
                        function loadtranhinh(nhanvats,kedichs)
                        {
                            tancong(nhanvats,kedichs,0);
                        }
                        // function loadtranhinh2(nhanvats,kedichs)
                        // {
                        //     var st = kedich.tancong-nhanvat.phongthu;
                        //     setTimeout(function(){ 
                        //         $("#satthuonglenta").append('-'+ st);
                        //             setTimeout(function(){$("#satthuonglenta").empty()}, 500);
                        //             nhanvat.binhluc-= st;
                        //             if (nhanvat.binhluc<=0) alert('Bạn đã thất bại');
                        //             else loadtranhinh(nhanvat,kedich);
                        //     }, 1000);
                            
                        // }

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