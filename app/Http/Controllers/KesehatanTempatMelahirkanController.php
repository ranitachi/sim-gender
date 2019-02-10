<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\KesehatanTempatMelahirkan;
use Config;

class KesehatanTempatMelahirkanController extends Controller
{
    public function index($id_kategori,$tahun=null)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanTempatMelahirkan::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();

        $jenis=['fasilitas'=>'Fasilitasi Kesehatan','bukan'=>'Bukan Fasilitas Kesehatan'];

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis]['laki_laki']=$d->laki_laki;
            $data[$d->jenis]['perempuan']=$d->perempuan;
            $data[$d->jenis]['kuantal_1']=$d->kuintil_1;
            $data[$d->jenis]['kuantal_2']=$d->kuintil_2;
            $data[$d->jenis]['kuantal_3']=$d->kuintil_3;
            $data[$d->jenis]['kuantal_4']=$d->kuintil_4;
            $data[$d->jenis]['kuantal_5']=$d->kuintil_5;
            $data[$d->jenis]['kuantal_5']=$d->kuintil_5;
            $data[$d->jenis]['tidak_sekolah']=$d->krt_tidak_sekolah;
            $data[$d->jenis]['sd']=$d->krt_sd;
            $data[$d->jenis]['smp']=$d->krt_smp;
            $data[$d->jenis]['sma']=$d->krt_sma;
            $data[$d->jenis]['kab_tangerang']=$d->kab_tangerang;
        }
        $krt=[
            'tidak_sekolah'=>'Tidak Pernah Sekolah/Tidak Tamat SD',
            'sd'=>'SD dan sederajat',
            'smp'=>'SMP dan sederajt',
            'sma'=>'SMA ke atas'
        ];
        $chart_puk = array();
        $chart_tpak = array();
        $chart_tkk = array();
        $chart_tpt = array();
        // return $data;
        return view('pages.kesehatan-tempatmelahirkan.index')
            ->with('kecamatan', $kecamatan)
            ->with('data', $data)
            ->with('krt', $krt)
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

        $jenis=['fasilitas'=>'Fasilitasi Kesehatan','bukan'=>'Bukan Fasilitas Kesehatan'];
        $krt=[
            'tidak_sekolah'=>'Tidak Pernah Sekolah/Tidak Tamat SD',
            'sd'=>'SD dan sederajat',
            'smp'=>'SMP dan sederajt',
            'sma'=>'SMA ke atas'
        ];
        return view('pages.kesehatan-tempatmelahirkan.create')
            ->with('krt', $krt)
            ->with('kecamatan', $kecamatan)
            ->with('kategori', $kategori)
            ->with('jenis', $jenis)
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
        $tidak_sekolah=$request->tidak_sekolah;
        $sd=$request->sd;
        $smp=$request->smp;
        $sma=$request->sma;
        $kab_tangerang=$request->kab_tangerang;
        
        foreach($laki_laki as $id_jen=>$val)
        {
            $ins=new KesehatanTempatMelahirkan;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenis = $id_jen;
            $ins->laki_laki = str_replace(array(',','.'),'.',$val);
            $ins->perempuan = str_replace(array(',','.'),'.',$perempuan[$id_jen]);
            $ins->kuintil_1 = str_replace(array(',','.'),'.',$kuantal_1[$id_jen]);
            $ins->kuintil_2 = str_replace(array(',','.'),'.',$kuantal_2[$id_jen]);
            $ins->kuintil_3 = str_replace(array(',','.'),'.',$kuantal_3[$id_jen]);
            $ins->kuintil_4 = str_replace(array(',','.'),'.',$kuantal_4[$id_jen]);
            $ins->kuintil_5 = str_replace(array(',','.'),'.',$kuantal_5[$id_jen]);
            $ins->krt_tidak_sekolah = str_replace(array(',','.'),'.',$tidak_sekolah[$id_jen]);
            $ins->krt_sd = str_replace(array(',','.'),'.',$sd[$id_jen]);
            $ins->krt_smp = str_replace(array(',','.'),'.',$smp[$id_jen]);
            $ins->krt_sma = str_replace(array(',','.'),'.',$sma[$id_jen]);
            $ins->kab_tangerang = str_replace(array(',','.'),'.',$kab_tangerang[$id_jen]);
            
            $ins->save();
        }
        return redirect()->route('tempat-melahirkan.index',[$id_kategori,$tahun])->with('Data Berhasil Disimpan');
    }

    public function edit($id_kategori,$tahun)
    {
        $kategori=Kategori::find($id_kategori);
        $kecamatan=Kecamatan::orderBy('nama_kecamatan')->get();
        if($tahun==null)
            $tahun=date('Y');
        else
            $tahun=$tahun;

        $jumlah = KesehatanTempatMelahirkan::where('id_kategori', $id_kategori)->where('tahun',$tahun)->get();
        $jenis=['fasilitas'=>'Fasilitasi Kesehatan','bukan'=>'Bukan Fasilitas Kesehatan'];

        $data=array();
        foreach($jumlah as $d)
        {
            $data[$d->jenis]['laki_laki']=$d->laki_laki;
            $data[$d->jenis]['perempuan']=$d->perempuan;
            $data[$d->jenis]['kuantal_1']=$d->kuintil_1;
            $data[$d->jenis]['kuantal_2']=$d->kuintil_2;
            $data[$d->jenis]['kuantal_3']=$d->kuintil_3;
            $data[$d->jenis]['kuantal_4']=$d->kuintil_4;
            $data[$d->jenis]['kuantal_5']=$d->kuintil_5;
            $data[$d->jenis]['kuantal_5']=$d->kuintil_5;
            $data[$d->jenis]['tidak_sekolah']=$d->krt_tidak_sekolah;
            $data[$d->jenis]['sd']=$d->krt_sd;
            $data[$d->jenis]['smp']=$d->krt_smp;
            $data[$d->jenis]['sma']=$d->krt_sma;
            $data[$d->jenis]['kab_tangerang']=$d->kab_tangerang;
        }
        $krt=[
            'tidak_sekolah'=>'Tidak Pernah Sekolah/Tidak Tamat SD',
            'sd'=>'SD dan sederajat',
            'smp'=>'SMP dan sederajt',
            'sma'=>'SMA ke atas'
        ];
        
        return view('pages.kesehatan-tempatmelahirkan.edit')
            ->with('kecamatan', $kecamatan)
            ->with('krt', $krt)
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('jenis', $jenis)
            ->with('id_kategori', $id_kategori)
            ->with('tahun', $tahun);
    }

    public function update(Request $request,$id_kategori,$tahun)
    {
        // return $request->all();
        KesehatanTempatMelahirkan::where('id_kategori',$id_kategori)->where('tahun',$tahun)->forceDelete();

        $laki_laki=$request->laki_laki;
        $perempuan=$request->perempuan;
        $kuantal_1=$request->kuantal_1;
        $kuantal_2=$request->kuantal_2;
        $kuantal_3=$request->kuantal_3;
        $kuantal_4=$request->kuantal_4;
        $kuantal_5=$request->kuantal_5;
        $tidak_sekolah=$request->tidak_sekolah;
        $sd=$request->sd;
        $smp=$request->smp;
        $sma=$request->sma;
        $kab_tangerang=$request->kab_tangerang;
        
        foreach($laki_laki as $id_jen=>$val)
        {
            $ins=new KesehatanTempatMelahirkan;
            $ins->id_kategori = $id_kategori;
            $ins->tahun = $tahun;
            $ins->jenis = $id_jen;
            $ins->laki_laki = str_replace(array(',','.'),'.',$val);
            $ins->perempuan = str_replace(array(',','.'),'.',$perempuan[$id_jen]);
            $ins->kuintil_1 = str_replace(array(',','.'),'.',$kuantal_1[$id_jen]);
            $ins->kuintil_2 = str_replace(array(',','.'),'.',$kuantal_2[$id_jen]);
            $ins->kuintil_3 = str_replace(array(',','.'),'.',$kuantal_3[$id_jen]);
            $ins->kuintil_4 = str_replace(array(',','.'),'.',$kuantal_4[$id_jen]);
            $ins->kuintil_5 = str_replace(array(',','.'),'.',$kuantal_5[$id_jen]);
            $ins->krt_tidak_sekolah = str_replace(array(',','.'),'.',$tidak_sekolah[$id_jen]);
            $ins->krt_sd = str_replace(array(',','.'),'.',$sd[$id_jen]);
            $ins->krt_smp = str_replace(array(',','.'),'.',$smp[$id_jen]);
            $ins->krt_sma = str_replace(array(',','.'),'.',$sma[$id_jen]);
            $ins->kab_tangerang = str_replace(array(',','.'),'.',$kab_tangerang[$id_jen]);
            
            $ins->save();
        }
        return redirect()->route('tempat-melahirkan.index',[$id_kategori,$tahun])->with('Data  Berhasil Diperbaharui');
    }
}
