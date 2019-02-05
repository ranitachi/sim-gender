<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KependudukanKelompokUmur;
use App\Models\Kategori;
use App\Models\Kecamatan;
use Config;
class KependudukanKelompokUmurController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $kelompok=Config::get('services.kelompok_umur');
        

        $kel = KependudukanKelompokUmur::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $data=array();
        foreach($kel as $val)
        {
            $data[$val->kelompok_umur]['laki_laki']=$val->laki_laki;
            $data[$val->kelompok_umur]['persen_laki_laki']=$val->persen_laki_laki;
            $data[$val->kelompok_umur]['perempuan']=$val->perempuan;
            $data[$val->kelompok_umur]['persen_perempuan']=$val->persen_perempuan;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $kelompok;
        // return $data;
        return view('pages.kependudukan-kelompokumur.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kelompok', $kelompok)
            ->with('chart_puk', $chart_puk)
            ->with('chart_tpak', $chart_tpak)
            ->with('chart_tkk', $chart_tkk)
            ->with('chart_tpt', $chart_tpt)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori,$tahun)
    {
        $kelompok=Config::get('services.kelompok_umur');
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        return view('pages.kependudukan-kelompokumur.create')
            ->with('kecamatan', $kecamatan)
            ->with('kelompok', $kelompok)
            ->with('kategori', $kategori)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $persen_laki_laki=$request->persen_laki_laki;
        $persen_perempuan=$request->persen_perempuan;

        foreach($laki_laki as $idkel=>$val)
        {
            $ins=new KependudukanKelompokUmur;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->laki_laki = str_replace(',','.',$val);
            $ins->persen_laki_laki = $persen_laki_laki[$idkel];
            $ins->perempuan = str_replace(',','.',$perempuan[$idkel]);
            $ins->persen_perempuan = $persen_perempuan[$idkel];
            $ins->kelompok_umur = $idkel;
            $ins->save();
        }
        return redirect()->route('kelompok-umur.index',[$id_kategori,$tahun])->with('Data Kelompok Umur Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $kelompok=Config::get('services.kelompok_umur');

        $kel = KependudukanKelompokUmur::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $data=array();
        foreach($kel as $val)
        {
            $data[$val->kelompok_umur]['laki_laki']=$val->laki_laki;
            $data[$val->kelompok_umur]['persen_laki_laki']=$val->persen_laki_laki;
            $data[$val->kelompok_umur]['perempuan']=$val->perempuan;
            $data[$val->kelompok_umur]['persen_perempuan']=$val->persen_perempuan;
        }
        
        return view('pages.kependudukan-kelompokumur.edit')
            ->with('kelompok', $kelompok)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        
        KependudukanKelompokUmur::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $persen_laki_laki=$request->persen_laki_laki;
        $persen_perempuan=$request->persen_perempuan;

        foreach($laki_laki as $idkel=>$val)
        {
            $ins=new KependudukanKelompokUmur;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->laki_laki = str_replace(array(',','.'),'',$val);
            $ins->persen_laki_laki = $persen_laki_laki[$idkel];
            $ins->perempuan = str_replace(array(',','.'),'',$perempuan[$idkel]);
            $ins->persen_perempuan = $persen_perempuan[$idkel];
            $ins->kelompok_umur = $idkel;
            $ins->save();
        }
        return redirect()->route('kelompok-umur.index',[$id_kategori,$tahun])->with('Data Kelompok Umur Berhasil Diperbaharui');
    }
}
