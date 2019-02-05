<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\PendidikanJumlahMurid;
use Config;
class PendidikanJumlahMuridController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanJumlahMurid::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenjang=Config::get('services.jenjang');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->id_kecamatan][$d->jenjang]['jumlah_laki']=$d->jumlah_laki;
            $data[$d->id_kecamatan][$d->jenjang]['jumlah_perempuan']=$d->jumlah_perempuan;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.pendidikan-jumlahmurid.index')
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

        $jenjang=Config::get('services.jenjang');

        return view('pages.pendidikan-jumlahmurid.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('jenjang', $jenjang)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $jumlah_laki=$request->jumlah_laki;
        $jumlah_perempuan=$request->jumlah_perempuan;
        
        foreach($jumlah_laki as $idkec=>$val)
        {
            foreach($val as $id_jng => $nilai)
            {
                $ins=new PendidikanJumlahMurid;
                $ins->id_kategori = $id_kategori;
                $ins->id_kecamatan = $idkec;
                $ins->tahun = $tahun;
                $ins->jenjang = $id_jng;
                $ins->jumlah_laki = str_replace(array(',','.'),'',$nilai);
                $ins->jumlah_perempuan = str_replace(array(',','.'),'',$jumlah_perempuan[$idkec][$id_jng]);
                $ins->save();
            }
        }
        return redirect()->route('jumlah-murid.index',[$id_kategori,$tahun])->with('Data Jumlah Muridn Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = PendidikanJumlahMurid::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenjang=Config::get('services.jenjang');

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->id_kecamatan][$d->jenjang]['jumlah_laki']=$d->jumlah_laki;
            $data[$d->id_kecamatan][$d->jenjang]['jumlah_perempuan']=$d->jumlah_perempuan;
        }
        
        return view('pages.pendidikan-jumlahmurid.edit')
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
        PendidikanJumlahMurid::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $jumlah_laki=$request->jumlah_laki;
        $jumlah_perempuan=$request->jumlah_perempuan;
        
        foreach($jumlah_laki as $idkec=>$val)
        {
            foreach($val as $id_jng => $nilai)
            {
                $ins=new PendidikanJumlahMurid;
                $ins->id_kategori = $id_kategori;
                $ins->id_kecamatan = $idkec;
                $ins->tahun = $tahun;
                $ins->jenjang = $id_jng;
                $ins->jumlah_laki = str_replace(array(',','.'),'',$nilai);
                $ins->jumlah_perempuan = str_replace(array(',','.'),'',$jumlah_perempuan[$idkec][$id_jng]);
                $ins->save();
            }
        }
        return redirect()->route('jumlah-murid.index',[$id_kategori,$tahun])->with('Data Jumlah Muridn Berhasil Diperbaharui');
    }
}
