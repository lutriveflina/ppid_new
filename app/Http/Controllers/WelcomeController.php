<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Support\Facades\Auth;
use App\DIP;
use App\informasiDiUnduh;
use App\Page;
use App\SKPD;
use Validator;
use App\Feedback;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $banner = Banner::where('klasifikasi', '=', 'BANNER')->get();
        $data['banner'] = $banner;
        return view('welcome', $data);
    }

    public function dip(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([
                            ['dip.statusDokumen', 'like', '%disetujui%']
                        ])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        if($row['jenis'] !== 'Informasi Berkala'){
                            $href = "<a href='". Storage::url($row->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                            return $href;
                        }

                        if(Auth::check()){
                            $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                            return $btn;
                        }
                
                    })
                    // ->addColumn('action', function($row){
                    //     $href = "<a href='". Storage::url($row->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                    //     return $href;
                    // })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('informasipublik.dip');
    }

    public function search(Request $request)
    {
        $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([
                            ['dip.statusDokumen', 'like', '%disetujui%'],
                            ['dip.judul', 'like', '%'. $request->judul .'%']
                        ])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

        // return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             if(Auth::check()) {
        //                 $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
        //                 return $btn;
        //             }
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);

        return view('welcome.search', ['data' => $data]);
    }

    public function berkala(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([
                            ['jenis.jenis', 'like', '%Informasi Berkala%'], ['dip.statusDokumen', 'like', '%disetujui%']])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if(Auth::check()) {
                            $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                            return $btn;
                        }
                    })
                    // ->addColumn('action', function($baris){
                    //     $href = "<a href='". Storage::url($baris->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                    //     return $href;
                    // })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('informasipublik.berkala');
    }

    public function sertamerta(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([['jenis.jenis', 'like', '%Informasi serta merta%'], ['dip.statusDokumen', 'like', '%disetujui%']])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     if(Auth::check()) {
                    //         $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                    //         return $btn;
                    //     }
                    // })
                    ->addColumn('action', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                        return $href;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('informasipublik.sertamerta');
    }

    public function setiapsaat(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([['jenis.jenis', 'like', '%Informasi Setiap Saat%'], ['dip.statusDokumen', 'like', '%disetujui%']])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     if(Auth::check()) {
                    //         $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                    //         return $btn;
                    //     }
                    // })
                    ->addColumn('action', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                        return $href;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('informasipublik.setiapsaat');
    }

    public function sakip(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([['kategori.kategori', 'like', '%SAKIP%'], ['dip.statusDokumen', 'like', '%disetujui%']])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     if(Auth::check()) {
                    //         $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                    //         return $btn;
                    //     }
                        
                    // })
                    ->addColumn('action', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                        return $href;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('informasipublik.sakip');
    }


    public function transparansi(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([
                            ['kategori.kategori', 'like', '%Laporan Keuangan%'],
                            // ['kategori.kategori', 'like', '%DPA%'],
                            // ['kategori.kategori', 'like', '%Laporan Kinerja%'],
                            ['dip.statusDokumen', 'like', '%disetujui%']
                        ])
                        ->orWhere('kategori.kategori', 'like', '%DPA%')
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if(Auth::check()) {
                            $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('welcome.transparansi');
    }

    public function statistikkota(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([
                            ['kategori.kategori', 'like', '%Statistik%'],
                            // ['kategori.kategori', 'like', '%DPA%'],
                            // ['kategori.kategori', 'like', '%Laporan Kinerja%'],
                            ['dip.statusDokumen', 'like', '%disetujui%']
                        ])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if(Auth::check()) {
                            $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('welcome.statistik');
    }

    public function monev(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
        //                 ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
        //                 ->select('skpd.skpd', 'kategori.kategori', DB::raw('COUNT(dip.idKategori) AS kategoriCount'))
        //                 ->where('dip.statusDokumen', 'like', '%disetujui%')
        //                 ->groupBy('skpd.skpd', 'kategori.kategori', 'dip.idKategori')
        //                 ->get();

        //     return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->make(true);
        // }
        $skpd = SKPD::get();

        $data = '';

        $idSkpd = $request->idSkpd;
        $tahun = $request->tahun;

        if($idSkpd != '') {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                ->select('skpd.skpd', 'kategori.kategori', DB::raw('COUNT(dip.idKategori) AS kategoriCount'))
                ->where(function($query) use ($idSkpd, $tahun){
                    $query->where('dip.statusDokumen', 'like', '%disetujui%');
                    $query->where('dip.idSkpd', '=', $idSkpd);

                    if($tahun != '') {
                        $query->whereYear('dip.created_at', '=', $tahun);
                    }
                })
                ->groupBy('skpd.skpd', 'kategori.kategori', 'dip.idKategori', 'dip.tahun')
                ->get();
        }

        return view('welcome.monev', ['skpd' => $skpd, 'data' => $data]);
    }

    public function ekliping(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('dip')
                    ->join('kategori', 'kategori.id', '=', 'dip.idKategori')
                    ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                    ->select('dip.id', 'dip.judul', 'dip.kandunganInformasi', 'dip.file', DB::raw('MONTH(dip.created_at) AS bulan'), DB::raw('YEAR(dip.created_at) AS tahun'), DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                    ->where('kategori.kategori', 'like', '%E-Kliping%')
                    ->groupBy('dip.id', 'dip.kandunganInformasi', 'dip.created_at', 'informasidiunduh.idDip', 'dip.file', 'dip.judul', 'dip.tahun')
                    ->orderBy('dip.created_at', 'desc')
                    ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     if(Auth::check()) {
                    //         $btn = "<a href=". url('ekliping/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                    //         return $btn;
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        $btn = "<a href='". Storage::url($row->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('welcome.ekliping');
    }

    public function downloadekliping($id, $userId)
    {
        $ekliping = DIP::select('file')->where('id', $id)->first();

        $informasidiunduh = new informasiDiUnduh();

        $informasidiunduh->idDip = $id;
        $informasidiunduh->idUsers = $userId;

        $informasidiunduh->save();

        return Storage::download($ekliping->file);
    }

    public function downloaddip($id, $userId)
    {
        $dip = DIP::select('file')->where('id', $id)->first();

        $informasidiunduh = new informasiDiUnduh();

        $informasidiunduh->idDip = $id;
        $informasidiunduh->idUsers = $userId;

        $informasidiunduh->save();

        return Storage::download($dip->file);
    }

    public function galeriview()
    {
        $galeri = Banner::where('klasifikasi', '=', 'GALERI')->get();

        return view('galeri.view', ['galeri' => $galeri]);
    }

    public function sop()
    {
        $data = Page::where('klasifikasi', 'like', '%Standar Operasional Prosedur%')->first();

        return view('welcome.sop', ['data' => $data]);
    }

    public function alurpermohonan()
    {
        $data = Page::where('klasifikasi', 'like', '%Alur Permohonan Informasi%')->first();

        return view('welcome.alurpermohonan', ['data' => $data]);
    }

    public function alurkeberatan()
    {
        $data = Page::where('klasifikasi', 'like', '%Alur Pengajuan Keberatan%')->first();

        return view('welcome.alurkeberatan', ['data' => $data]);
    }

    public function alursengketa()
    {
        $data = Page::where('klasifikasi', 'like', '%Alur Fasilitasi Sengketa Informasi%')->first();

        return view('welcome.alursengketa', ['data' => $data]);
    }

    public function biayapelayanan()
    {
        $data = Page::where('klasifikasi', 'like', '%Biaya Pelayanan%')->first();

        return view('welcome.biayapelayanan', ['data' => $data]);
    }

    public function jadwalpelayanan()
    {
        $data = Page::where('klasifikasi', 'like', '%Jadwal Pelayanan%')->first();

        return view('welcome.jadwalpelayanan', ['data' => $data]);
    }

    public function prosedursp4n()
    {
        $data = Page::where('klasifikasi', 'like', '%Prosedur Pengaduan (Lapor SP4N)%')->first();

        return view('welcome.prosedursp4n', ['data' => $data]);
    }

    public function regulasiketerbukaan(Request $request)
    {
        if ($request->ajax()) {
            $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.*')
                        ->where([
                            ['kategori.kategori', 'like', '%Regulasi KIP%'],
                            // ['kategori.kategori', 'like', '%DPA%'],
                            // ['kategori.kategori', 'like', '%Laporan Kinerja%'],
                            ['dip.statusDokumen', 'like', '%disetujui%']
                        ])
                        ->orderBy('dip.created_at','desc')
                        ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row['jenis'] !== 'Informasi Berkala'){
                            $href = "<a href='". Storage::url($row->file) ."' target='blank' class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i>" ." </a>";
                            return $href;
                        }

                        if(Auth::check()){
                            $btn = "<a href=". url('dip/download/'. $row->id. '/'. Auth::user()->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>";
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('welcome.regulasiketerbukaan');
    }

    public function surveikepuasan()
    {
        return view('welcome.surveikepuasan');
    }

    public function statistikppid()
    {
        return view('welcome.statistikppid');
    }

    public function feedbackppid(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'nullable|email',
            'pesan' => 'nullable|string',
        ]);

        if($validator->passes()){
            $pesan = new Feddback();

            $pesan->name = $request->name;
            $pesan->email = $request->email;
            $pesan->pesan = $request->pesan;

            $skpd->save();

            return redirect()->back()->with(['success' => 'Kritik dan Saran Berhasil di kirim!']);
        }

        // return redirect()->back()->withErrors($validator);
        return view('welcome.feedbackppid');
    }
}
