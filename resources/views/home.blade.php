@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Quang Trung Truyền Kì</div>

                <div class="panel-body" style="height: 600px;margin: 0;padding: 0">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::check()) 
                           <?php $nhanvat =  Auth::user()->nhanvat();?>
                    @endif
                    @if(empty($nhanvat))
                    <form action="../nhanvats" method="post">
                        {{ csrf_field() }}
                        Nhap ten nhan vat<input name="name" type="text" id="inpuTenNV">
                        <input type="hidden" name="id" value="{{Auth::id()}}">
                        <input type="submit"  value="Tao">
                    </form>
                    @else
                        <div style="background: #497541;height: 600px">
                            <div class="col-md-2">
                                <img src="image/avatar.jpg" width="150" height="150" style="background: #eee5ce;border-radius: 100%;border: 2px solid #eee5ce">
                                <div style="position: absolute;top: 120px;left: 10px">
                                <h6 style="text-align: center;font-weight: bold;color: #cb5529;font-size: 16px">{{$nhanvat->capdo}} Cấp</h6>
                                <h4 style="background: #240101;text-align: center;padding: 5px;
                                width: 160px;color: #cb5529;border-radius: 5px;border: 2px solid #d1ac6c">
                                <b>{{$nhanvat->name}}</b></h4>
                                </div>
                            </div>
                            <div class="col-md-2" style="color: #222">
                                <b>Xu : {{$nhanvat->xu}}</b><br>
                                <b>Xu Quà : {{$nhanvat->xuqua}}</b><br>
                                <b>Bạc : {{$nhanvat->bac}}</b><br>
                                <b>Chiến tích : {{$nhanvat->chientich}}</b>
                            </div>


                            <div id="mainContentDiv">
                                <img src="image/Nha_chinh_7.png" style="width: 200px;position: absolute;top:200px;left: 500px">
                            </div>


                            <div style="position: absolute;top: 570px;right: 50px">

                                <img src="image/muathu.jpg" style="width: 120px;height:120px;border-radius: 100%;
                                border: 2px solid #eee5ce;position: absolute;right: -34px;bottom: 10px">

                                <a onclick="loadthanh()" style="cursor: pointer;position: absolute;right: 80px;bottom: 20px" class="thanh-chien-khuvuc active">
                                    Thành
                                </a>
                                <a onclick="loadchien()" style="cursor: pointer;position: absolute;right:86px;bottom: 60px" class="thanh-chien-khuvuc" id="chienBtn">
                                    Chiến
                                </a>
                                <a onclick="loadkhuvuc()" style="cursor: pointer;position: absolute;right: 70px;bottom: 95px" class="thanh-chien-khuvuc">
                                    K.vực
                                </a>

                                <a onclick="loadvotuong()"><img src="image/votuong2.jpg" style="background: #eee5ce;border-radius: 100%;border: 2px solid #eee5ce;width: 50px;height: 50px;margin-right: 200px"></a>
                                <div class="caption">
                                <p style="color: #e6bf2f">Võ tướng</p>
                              </div>
                            </div>
                            <div id="divlistVotuong" 
                            style="height: 500px;width:600px;position: absolute;z-index: 5;background: #424444;top:100px;right: 250px;display: none;border: 4px solid #a87d49;border-radius: 5px">
                                <a class="btn">Luyện</a><a class="btn">Trang bị</a><a class="btn">Chiêu</a>
                                <a class="btn" onclick="tranhinh()">Trận</a>
                                <a class="btn" style="float: right;" onclick="tatlisvt()">Tắt</a>
                                <div id="divContent" style="border: 2px solid #080e0f;margin: 10px;height: 400px;padding: 10px">
                                        
                                </div>
                            </div>

                            <div id="divlistTranhinh" 
                            style="height: 500px;width:600px;position: absolute;z-index: 5;background: #424444;top:100px;right: 250px;display: none;border: 4px solid #a87d49;border-radius: 5px">
                                <a class="btn">Luyện</a><a class="btn">Trang bị</a><a class="btn">Chiêu</a>
                                <a class="btn" onclick="tranhinh()">Trận</a>
                                <a class="btn" style="float: right;" onclick="tatlisvt()">Tắt</a>
                                <div id="divContent" style="border: 2px solid #080e0f;margin: 10px;height: 400px;padding: 10px">
                                        <div style="border: 2px solid #080e0f;height: 370px;width: 200px">
                                            <h3>*Hệ thông võ hồn</h3>
                                            <h3>*Danh sách tướng</h3>
                                            <div id="listVotuong">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    @include('includes.js')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
