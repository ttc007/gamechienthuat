<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nhanvat extends Model
{
    protected $guarded = [];

    public function votuongs()
    {
    	return  DB::table('nhanvat_votuongs')
    		->join('votuongs', 'votuongs.id', '=', 'nhanvat_votuongs.votuong_id')
            // ->join('nhanvats', 'nhanvats.id', '=', 'nhanvat_votuongs.nhanvat_id')
            ->where('nhanvat_votuongs.nhanvat_id', $this->id)
    		->get();
    }

    public function votuongratrans()
    {
        return  DB::table('nhanvat_votuongs')
            ->join('votuongs', 'votuongs.id', '=', 'nhanvat_votuongs.votuong_id')
            ->where('nhanvat_votuongs.nhanvat_id', $this->id)
            ->where('nhanvat_votuongs.vitri', ">", 0)
            ->get();
    }

    public function tranhinhs()
    {
    	return  DB::table('nhanvat_tranhinhs')
    		->join('tranhinhs', 'tranhinhs.id', '=', 'nhanvat_tranhinhs.tranhinh_id')
            ->where('nhanvat_tranhinhs.nhanvat_id', $this->id)
    		->get();
    }

    public function tranhinhdangsudung()
    {
        $tranhinhs = DB::table('nhanvat_tranhinhs')
            ->join('tranhinhs', 'tranhinhs.id', '=', 'nhanvat_tranhinhs.tranhinh_id')
            ->where('nhanvat_tranhinhs.nhanvat_id', $this->id)
            ->where('nhanvat_tranhinhs.active', 1)
            ->get();
        $tranhinh = $tranhinhs[0];
        return $tranhinhs;
    }
}
