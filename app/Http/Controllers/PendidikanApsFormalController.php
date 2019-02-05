<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PendidikanApsFormal;
use Config;

class PendidikanApsFormalController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanApsFormal::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $kelompok_usia=Config::get('services.kelompok_usia');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->kelompok_usia]['laki_laki']=$d->laki_laki;
            $data[$d->kelompok_usia]['perempuan']=$d->perempuan;
            $data[$d->kelompok_usia]['kuantal_1']=$d->kuintil_1;
            $data[$d->kelompok_usia]['kuantal_2']=$d->kuintil_2;
            $data[$d->kelompok_usia]['kuantal_3']=$d->kuintil_3;
            $data[$d->kelompok_usia]['kuantal_4']=$d->kuintil_4;
            $data[$d->kelompok_usia]['kuantal_5']=$d->kuintil_5;
            $data[$d->kelompok_usia]['kuantal_5']=$d->kuintil_5;
            $data[$d->kelompok_usia]['kab_tangerang']=$d->kab_tangerang;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.pendidikan-apsformal.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('kelompok_usia', $kelompok_usia)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun)
            ->with('chart_kecamatan', $chart_puk)
            ->with('chart_tpak', $chart_tpak)
            ->with('chart_tkk', $chart_tkk)
            ->with('chart_tpt', $chart_tpt)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $kelompok_usia=Config::get('services.kelompok_usia');

        return view('pages.pendidikan-apsformal.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('kelompok_usia', $kelompok_usia)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $kuantal_1=$request->kuantal_1;
        $kuantal_2=$request->kuantal_2;
        $kuantal_3=$request->kuantal_3;
        $kuantal_4=$request->kuantal_4;
        $kuantal_5=$request->kuantal_5;
        $kab_tangerang=$request->kab_tangerang;
        
        foreach($laki_laki as $id_jen=>$val)
        {
            $ins=new PendidikanApsFormal;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->kelompok_usia = $id_jen;
            $ins->laki_laki = str_replace(array(',','.'),'.',$val);
            $ins->perempuan = str_replace(array(',','.'),'.',$perempuan[$id_jen]);
            $ins->kuintil_1 = str_replace(array(',','.'),'.',$kuantal_1[$id_jen]);
            $ins->kuintil_2 = str_replace(array(',','.'),'.',$kuantal_2[$id_jen]);
            $ins->kuintil_3 = str_replace(array(',','.'),'.',$kuantal_3[$id_jen]);
            $ins->kuintil_4 = str_replace(array(',','.'),'.',$kuantal_4[$id_jen]);
            $ins->kuintil_5 = str_replace(array(',','.'),'.',$kuantal_5[$id_jen]);
            $ins->kab_tangerang = str_replace(array(',','.'),'.',$kab_tangerang[$id_jen]);
            
            $ins->save();
        }
        return redirect()->route('aps-formal.index',[$id_kategori,$tahun])->with('Data Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanApsFormal::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $kelompok_usia=Config::get('services.kelompok_usia');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->kelompok_usia]['laki_laki']=$d->laki_laki;
            $data[$d->kelompok_usia]['perempuan']=$d->perempuan;
            $data[$d->kelompok_usia]['kuantal_1']=$d->kuintil_1;
            $data[$d->kelompok_usia]['kuantal_2']=$d->kuintil_2;
            $data[$d->kelompok_usia]['kuantal_3']=$d->kuintil_3;
            $data[$d->kelompok_usia]['kuantal_4']=$d->kuintil_4;
            $data[$d->kelompok_usia]['kuantal_5']=$d->kuintil_5;
            $data[$d->kelompok_usia]['kab_tangerang']=$d->kab_tangerang;
        }
        
        return view('pages.pendidikan-apsformal.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('kelompok_usia', $kelompok_usia)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        PendidikanApsFormal::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $kuantal_1=$request->kuantal_1;
        $kuantal_2=$request->kuantal_2;
        $kuantal_3=$request->kuantal_3;
        $kuantal_4=$request->kuantal_4;
        $kuantal_5=$request->kuantal_5;
        $kab_tangerang=$request->kab_tangerang;
        
        foreach($laki_laki as $id_jen=>$val)
        {
            $ins=new PendidikanApsFormal;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->kelompok_usia = $id_jen;
            $ins->laki_laki = str_replace(array(',','.'),'.',$val);
            $ins->perempuan = str_replace(array(',','.'),'.',$perempuan[$id_jen]);
            $ins->kuintil_1 = str_replace(array(',','.'),'.',$kuantal_1[$id_jen]);
            $ins->kuintil_2 = str_replace(array(',','.'),'.',$kuantal_2[$id_jen]);
            $ins->kuintil_3 = str_replace(array(',','.'),'.',$kuantal_3[$id_jen]);
            $ins->kuintil_4 = str_replace(array(',','.'),'.',$kuantal_4[$id_jen]);
            $ins->kuintil_5 = str_replace(array(',','.'),'.',$kuantal_5[$id_jen]);
            $ins->kab_tangerang = str_replace(array(',','.'),'.',$kab_tangerang[$id_jen]);
            
            $ins->save();
        }
        return redirect()->route('aps-formal.index',[$id_kategori,$tahun])->with('Data  Berhasil Diperbaharui');
    }
}
