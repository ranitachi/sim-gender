<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subyek;
use App\Models\Kategori;
class SubyekController extends Controller
{
    public function index($jenis)
    {
        $subyek=Subyek::where('slug','like',$jenis)->get();
        // dd($subyek);
        if($subyek->count()!=0)
        {
            $sbj=$subyek->first();
            $data=Kategori::where('id_subyek',$sbj->id)->get();
        }
        else
        {
            $data=$sbj=array();
        }

        $tahun=array();
        foreach($data as $d)
        {
            $tahun[$d->tahun]=$d->tahun;
        }
        
        return view('pages.subyek.data')
                    ->with('tahun',$tahun)
                    ->with('sbj',$sbj)
                    ->with('jenis',$jenis)
                    ->with('data',$data);
    }
}
