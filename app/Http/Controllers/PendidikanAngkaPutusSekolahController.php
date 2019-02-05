<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PendidikanAngkaPutusSekolah;
use Config;

class PendidikanAngkaPutusSekolahController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanAngkaPutusSekolah::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenjang=Config::get('services.jenjang2');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenjang]['laki_laki']=$d->laki_laki;
            $data[$d->jenjang]['perempuan']=$d->perempuan;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.pendidikan-apts.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('jenjang', $jenjang)
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

        $jenjang=Config::get('services.jenjang2');

        return view('pages.pendidikan-apts.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('jenjang', $jenjang)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
       
        
        foreach($laki_laki as $id_jng=>$val)
        {
            $ins=new PendidikanAngkaPutusSekolah;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenjang = $id_jng;
            $ins->laki_laki = str_replace(array(',','.'),'.',$val);
            $ins->perempuan = str_replace(array(',','.'),'.',$perempuan[$id_jng]);
            
            $ins->save();
        }
        return redirect()->route('apts.index',[$id_kategori,$tahun])->with('Data Jumlah Rasio Murid dan Guru Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanAngkaPutusSekolah::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenjang=Config::get('services.jenjang2');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenjang]['laki_laki']=$d->laki_laki;
            $data[$d->jenjang]['perempuan']=$d->perempuan;
        }
        
        return view('pages.pendidikan-apts.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('jenjang', $jenjang)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        PendidikanAngkaPutusSekolah::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
       
        
        foreach($laki_laki as $id_jng=>$val)
        {
            $ins=new PendidikanAngkaPutusSekolah;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenjang = $id_jng;
            $ins->laki_laki = str_replace(array(',','.'),'.',$val);
            $ins->perempuan = str_replace(array(',','.'),'.',$perempuan[$id_jng]);
            
            $ins->save();
        }
        return redirect()->route('apts.index',[$id_kategori,$tahun])->with('Data Jumlah Rasio Murid dan Guru Berhasil Diperbaharui');
    }
}
