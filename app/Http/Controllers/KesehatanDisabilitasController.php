<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KesehatanDisabilitas;
use App\Models\Kategori;
use App\Models\Subyek;
use App\Models\Kecamatan;
use DB;
class KesehatanDisabilitasController extends Controller
{
    public function index($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);
        $data = KesehatanDisabilitas::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        
        $jenis=array('Tuna Daksa /cacat tubuh','Tuna netra/buta','Tuna rungu','Tuna wicara','Tuna rungu & wicara','Tuna netra & cacat tubuh','Tuna netra, rungu & wicara ','Tuna rungu, wicara & cacat tubuh ','Tuna rungu, wicara, netra & cacat tubuh',' Cacat mental retradasi ',' mantan penderita gangguan jiwa',' cacat fisik & mental');
        
        foreach($data as $k =>$v)
        {
            $det[str_slug($v->jenis)]['jumlah']=$v->jumlah;
            $chart_kecamatan[str_slug($v->jenis)] = ucwords(strtolower($v->jenis));
        }

        return view('pages.kesehatan-disabilitas.index')
            ->with('data', $data)
            ->with('jenis', $jenis)
            ->with('chart_kecamatan', $chart_kecamatan)
            ->with('det', $det)  
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function create($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        $kecamatan = Kecamatan::all();
        $jenis=array('Tuna Daksa /cacat tubuh','Tuna netra/buta','Tuna rungu','Tuna wicara','Tuna rungu & wicara','Tuna netra & cacat tubuh','Tuna netra, rungu & wicara ','Tuna rungu, wicara & cacat tubuh ','Tuna rungu, wicara, netra & cacat tubuh',' Cacat mental retradasi ',' mantan penderita gangguan jiwa',' cacat fisik & mental');
        return view('pages.kesehatan-disabilitas.create')
            ->with('kecamatan', $kecamatan)
            ->with('jenis', $jenis)
            ->with('kategori', $kategori);
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::with('subyek')->findOrFail($id_kategori);

        
        // $data = KesehatanDisabilitas::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $data = KesehatanDisabilitas::where('id_kategori', $id_kategori)->with('kecamatan')->get();
        $kecamatan=Kecamatan::orderBy('nama_kecamatan','asc')->get();

        $det=array();
        $chart_kecamatan = [];
        $jenis=array('Tuna Daksa /cacat tubuh','Tuna netra/buta','Tuna rungu','Tuna wicara','Tuna rungu & wicara','Tuna netra & cacat tubuh','Tuna netra, rungu & wicara ','Tuna rungu, wicara & cacat tubuh ','Tuna rungu, wicara, netra & cacat tubuh',' Cacat mental retradasi ',' mantan penderita gangguan jiwa',' cacat fisik & mental');
        
        foreach($data as $k =>$v)
        {
            $det[str_slug($v->jenis)]['jumlah']=$v->jumlah;
            $chart_kecamatan[str_slug($v->jenis)] = ucwords(strtolower($v->jenis));
        }
        // dd($det);
        return view('pages.kesehatan-disabilitas.edit')
            ->with('data', $data)
            ->with('det', $det)    
            ->with('jenis', $jenis)    
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori);
    }

    public function update(Request $request, $id_kategori)
    {
        DB::transaction(function () use($request, $id_kategori) {
            
            KesehatanDisabilitas::where('id_kategori', $id_kategori)->forceDelete();
    
            $jumlah=$request->jumlah;
            foreach($request->jenis as $idx=> $id)
            {   
                $jumlah=(is_null($jumlah[$idx]) ? 0 : $jumlah[$idx]);

                $insert = new KesehatanDisabilitas;
                $insert->jenis= $id;
                $insert->jumlah= $jumlah[$idx];
                $insert->save();
            }
        });

        return redirect()->route('kesehatan-disabilitas.index', array($id_kategori));
    }

    public function store(Request $request, $id_kategori)
    {
            $jumlah=$request->jumlah;
            foreach($request->jenis as $idx=> $id)
            {   
                $jumlah=(is_null($jumlah[$idx]) ? 0 : $jumlah[$idx]);

                $insert = new KesehatanDisabilitas;
                $insert->jenis= $id;
                $insert->jumlah= $jumlah[$idx];
                $insert->save();
            }

        return redirect()->route('kesehatan-disabilitas.index', array($id_kategori));
    }
}
