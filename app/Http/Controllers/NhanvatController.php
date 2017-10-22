<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nhanvat;
use App\Nhanvat_votuong;
use App\Nhanvat_tranhinh;
use App\User;
use Illuminate\Support\Facades\Auth;


class NhanvatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Nhanvat::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function quyetchien($nhanvat_id, $kedich_id)
    {
        $data = [];
        $nhanvat = Nhanvat::find($nhanvat_id);
        $data['nhanvatVotuongs'] = $nhanvat->votuongs();
        $kedich = Nhanvat::find($kedich_id);
        $data['kedichVotuongs'] = $kedich->votuongs();
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->id);
        $nhanvat = Nhanvat::create([
            "name" => $request->name,
            "user_id" => $request->id
        ]);
        Nhanvat_votuong::create([
            "nhanvat_id" => $nhanvat->id,
            "votuong_id" => 1,
            "vitri" => 2,
        ]);

        Nhanvat_tranhinh::create([
            "nhanvat_id" => $nhanvat->id,
            "tranhinh_id" => 1,
            'active' => 1
        ]);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
