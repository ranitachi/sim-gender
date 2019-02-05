<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KependudukanAngkaIndex;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KabupatenKota;
class KependudukanAngkaIndexController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $kota=KabupatenKota::where('province_id',36)->get();
        $kel = KependudukanAngkaIndex::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $data=array();
        foreach($kel as $val)
        {
            $data[$val->id_kabupaten]['ipg']=$val->ipg;
            $data[$val->id_kabupaten]['ipm']=$val->ipm;
            $data[$val->id_kabupaten]['idg']=$val->idg;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $kelompok;
        // return $data;
        return view('pages.kependudukan-angkaindex.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('tahun', $tahun)
            ->with('kota', $kota)
            ->with('chart_puk', $chart_puk)
            ->with('chart_tpak', $chart_tpak)
            ->with('chart_tkk', $chart_tkk)
            ->with('chart_tpt', $chart_tpt)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori,$tahun)
    {
        $kota=KabupatenKota::where('province_id',36)->get();
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        return view('pages.kependudukan-angkaindex.create')
            ->with('kecamatan', $kecamatan)
            ->with('kota', $kota)
            ->with('kategori', $kategori)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        $ipg=$request->ipg;
        $ipm=$request->ipm;
        $idg=$request->idg;

        foreach($ipg as $idkab=>$val)
        {
            $ins=new KependudukanAngkaIndex;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->id_kabupaten = $idkab;
            $ins->ipg = str_replace(',','.',$val);
            $ins->ipm = str_replace(',','.',$ipm[$idkab]);
            $ins->idg = str_replace(',','.',$idg[$idkab]);
            $ins->save();
        }
        return redirect()->route('angka-index.index',[$id_kategori,$tahun])->with('Data Angka Index Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $kota=KabupatenKota::where('province_id',36)->get();
        $kel = KependudukanAngkaIndex::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $data=array();
        foreach($kel as $val)
        {
            $data[$val->id_kabupaten]['ipg']=$val->ipg;
            $data[$val->id_kabupaten]['ipm']=$val->ipm;
            $data[$val->id_kabupaten]['idg']=$val->idg;
        }
        
        return view('pages.kependudukan-angkaindex.edit')
            ->with('kota', $kota)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        
        KependudukanAngkaIndex::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $ipg=$request->ipg;
        $ipm=$request->ipm;
        $idg=$request->idg;

        foreach($ipg as $idkab=>$val)
        {
            $ins=new KependudukanAngkaIndex;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->id_kabupaten = $idkab;
            $ins->ipg = str_replace(',','.',$val);
            $ins->ipm = str_replace(',','.',$ipm[$idkab]);
            $ins->idg = str_replace(',','.',$idg[$idkab]);

            $ins->save();
        }
        return redirect()->route('angka-index.index',[$id_kategori,$tahun])->with('Data Angka Index Berhasil Diperbaharui');
    }
}
