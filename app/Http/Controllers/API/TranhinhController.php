<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nhanvat;
use App\Tranhinh;
use App\User;
use Illuminate\Support\Facades\Auth;


class TranhinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nhanvat_id)
    {
        $nhanvat = Nhanvat::find($nhanvat_id);
        $tranhinhs = $nhanvat->tranhinhs();
        // foreach ($tranhinhs as $key => $value) {
        //     $value->vitri = explode(",", $value->vitri);
        // }
        return $tranhinhs;
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
        return view('home', compact('nhanvat'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nhanvat_id, $id)
    {
        $nhanvat = Nhanvat::find($nhanvat_id);
        $tranhinh = $nhanvat->tranhinhdangsudung();
        return $tranhinh;
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
