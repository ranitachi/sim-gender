<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KesehatanImunisasiRutin;
use Config;
class KesehatanImunisasiRutinController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanImunisasiRutin::where('id_kategori', $id_kategori)->get();

        $jenis=['bcg'=>'BCG','hepatitis'=>'Hepatitis B O','dpt'=>'DPT - HB III','polio'=>'Polio IV','campak'=>'Campak'];

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis][$d->tahun]['jumlah']=$d->jumlah;
            $data[$d->jenis][$d->tahun]['persentase']=$d->persentase;
        }

        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.kesehatan-imunisasirutin.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('jenis', $jenis)
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

        $jenis=['bcg'=>'BCG','hepatitis'=>'Hepatitis B O','dpt'=>'DPT - HB III','polio'=>'Polio IV','campak'=>'Campak'];

        return view('pages.kesehatan-imunisasirutin.create')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('jenis', $jenis)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function store(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        // $jumlah=$request->jumlah;
        $persentase=$request->persentase;
        
        foreach($persentase as $id_jen=>$thn)
        {
            foreach($thn as $th=>$val)
            {
                $ins=new KesehatanImunisasiRutin;
                $ins->id_kategori = $id_kategori;
                $ins->tahun = $th;
                $ins->jenis = $id_jen;
                $ins->jumlah = str_replace(array(',','.'),'',$val);
                $ins->save();
            }
            // $ins->persentase = str_replace(array(',','.'),'.',$persentase[$id_jen]);
            
        }
        return redirect()->route('imunisasi-rutin.index',[$id_kategori,$tahun])->with('Data Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanImunisasiRutin::where('id_kategori', $id_kategori)->get();
        $jenis=['bcg'=>'BCG','hepatitis'=>'Hepatitis B O','dpt'=>'DPT - HB III','polio'=>'Polio IV','campak'=>'Campak'];

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis][$d->tahun]['jumlah']=$d->jumlah;
            $data[$d->jenis][$d->tahun]['persentase']=$d->persentase;
        }
        
        return view('pages.kesehatan-imunisasirutin.edit')
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('jenis', $jenis)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        

        // $jumlah=$request->jumlah;
        $persentase=$request->persentase;
        
        foreach($persentase as $id_jen=>$thn)
        {
            foreach($thn as $th=>$val)
            {
                // KesehatanImunisasiRutin::where('id_kategori',$id_kategori)->where('tahun',$th)->forceDelete();
                $ins=KesehatanImunisasiRutin::where('id_kategori',$id_kategori)->where('jenis',$id_jen)->where('tahun',$th)->first();
                $ins->jumlah = str_replace(array(',','.'),'',$val);
                $ins->save();
                // $ins->id_kategori = $id_kategori;
                // $ins->tahun = $th;
                // $ins->jenis = $id_jen;
            }
            // $ins->persentase = str_replace(array(',','.'),'.',$persentase[$id_jen]);
            
        }
        return redirect()->route('imunisasi-rutin.index',[$id_kategori,$tahun])->with('Data  Berhasil Diperbaharui');
    }
}
