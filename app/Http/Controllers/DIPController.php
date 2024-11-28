<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\DIP;
use App\Jenis;
use App\Kategori;
use App\SKPD;
use App\TipeFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DIPController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin|adminskpd']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if(Auth::user()->hasRole('superadmin')) {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();
            } else {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([['dip.idSkpd', '=', Auth::user()->idSKPD]])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('judul', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank'>". $baris->judul ."</a>";

                        return $href;
                    })
                    ->addColumn('penerbit', function($baris){
                        $data = $baris->skpd . '<br>' . $baris->created_at . '<br>' . $baris->name;

                        return $data;
                    })
                    ->addColumn('action', function($row){

                           $btn = "<a href=". route('dip.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("dip.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";
                           if(Auth::user()->hasRole('superadmin')) {
                                $btn .= "<a href=". route('dip.show', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                           }
                            return $btn;
                    })
                    ->rawColumns(['action', 'judul', 'penerbit'])
                    ->make(true);
        }

        return view('dip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skpd = '';

        if (Auth::user()->hasRole('superadmin')) {
            $skpd = SKPD::get();
        } else {
            $skpd = SKPD::where('id', Auth::user()->idSKPD)->get();
        }

        $kategori = Kategori::get();
        $jenis = Jenis::get();
        $tipefile = TipeFile::get();

        return view('dip.create', ['skpd' => $skpd, 'kategori' => $kategori, 'jenis' => $jenis, 'tipefile' => $tipefile]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'idSkpd' => 'required|numeric',
            'kandunganInformasi' => 'required|string',
            'idKategori' => 'required|numeric',
            'idJenis' => 'required|numeric',
            'idTipeFile' => 'required|numeric',
            'file' => 'required|max:51200|mimes:avi,csv,doc,docx,epub,gif,jpeg,jpg,mp3,mpeg,odp,ods,odt,png,pdf,ppt,pptx,rar,vsd,wav,xls,xlsx,zip,3gp',
            'statusDokumen' => 'required|string',
            'tahun' => 'required|date_format:Y',
        ]);

        if($validator->passes()){
            $dip = new DIP();

            $dip->judul = $request->judul;
            $dip->idSkpd = $request->idSkpd;
            $dip->kandunganInformasi = $request->kandunganInformasi;
            $dip->idKategori = $request->idKategori;
            $dip->idJenis = $request->idJenis;
            $dip->idTipeFile = $request->idTipeFile;

            $file = $request->file('file');
            $path_file = $file->store('public/files/dip/' . $file->getClientOriginalExtension());
            $dip->file = $path_file;

            $dip->statusDokumen = $request->statusDokumen;
            $dip->idUsers = Auth::user()->id;
            $dip->tahun = $request->tahun;

            $dip->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DIP  $dIP
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dip = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*')
                ->where('dip.id', $id)
                ->first();

        return view('dip.show', ['dip' => $dip]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DIP  $dIP
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dip = DIP::where('id', $id)->first();

        $skpd = '';

        if (Auth::user()->hasRole('superadmin')) {
            $skpd = SKPD::get();
        } else {
            $skpd = SKPD::where('id', Auth::user()->idSKPD)->get();
        }

        $kategori = Kategori::get();
        $jenis = Jenis::get();
        $tipefile = TipeFile::get();

        return view('dip.edit', ['dip' => $dip, 'skpd' => $skpd, 'kategori' => $kategori, 'jenis' => $jenis, 'tipefile' => $tipefile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DIP  $dIP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'idSkpd' => 'required|numeric',
            'kandunganInformasi' => 'required|string',
            'judul' => 'required|string',
            'idKategori' => 'required|numeric',
            'idJenis' => 'required|numeric',
            'idTipeFile' => 'required|numeric',
            'file' => 'nullable|max:51200|mimes:avi,csv,doc,docx,epub,gif,jpeg,jpg,mp3,mpeg,odp,ods,odt,png,pdf,ppt,pptx,rar,vsd,wav,xls,xlsx,zip,3gp',
            'statusDokumen' => 'required|string',
            'tahun' => 'required|date_format:Y',
        ]);

        if($validator->passes()){
            $dip = DIP::where('id', $id)->first();

            $dip->judul = $request->judul;
            $dip->idSkpd = $request->idSkpd;
            $dip->kandunganInformasi = $request->kandunganInformasi;
            $dip->idKategori = $request->idKategori;
            $dip->idJenis = $request->idJenis;
            $dip->idTipeFile = $request->idTipeFile;

            if($request->file('file') != '') {
                Storage::delete($dip->file);

                $file = $request->file('file');
                $path_file = $file->store('public/files/dip/' . $file->getClientOriginalExtension());
                $dip->file = $path_file;
            } else {
                $dip->file = $dip->file;
            }

            $dip->statusDokumen = $request->statusDokumen;
            $dip->idUsers = Auth::user()->id;
            $dip->tahun = $request->tahun;

            $dip->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DIP  $dIP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dip = DIP::where('id', $id)->first();

        Storage::delete($dip->file);

        $dip->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }

    public function draft(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if(!Auth::user()->hasRole('superadmin')) {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*')
                        ->where([['dip.idSkpd', '=', Auth::user()->idSKPD], ['dip.statusDokumen', '=', 'DRAFT']])
                        ->get();
            } else {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*')
                        ->where('dip.statusDokumen', '=', 'DRAFT')
                        ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('judul', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank'>". $baris->judul ."</a>";

                        return $href;
                    })
                    ->addColumn('penerbit', function($baris){
                        $data = $baris->skpd . '<br>' . $baris->created_at . '<br>' . $baris->name;

                        return $data;
                    })
                    ->addColumn('action', function($row){

                           $btn = "<a href=". route('dip.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("dip.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";
                           $btn .= "<a href=". url('dip/publish', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Publish'><i class='feather icon-check-square'></i></a>";

                           return $btn;
                    })
                    ->rawColumns(['action', 'judul', 'penerbit'])
                    ->make(true);
        }

        return view('dip.draft');
    }

    public function publish($id)
    {
        $dip = DIP::where('id', $id)->first();

        $dip->statusDokumen = 'MENUNGGU VERIFIKASI PPID UTAMA';

        $dip->save();

        return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
    }

    public function verifikasi(Request $request, $id)
    {
        $dip = DIP::where('id', $id)->first();

        $dip->statusDokumen = $request->statusDokumen;
        $dip->keterangan = $request->keteragan;

        $dip->save();

        return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
    }

    public function printdippdf()
    {
        if(!file_exists(storage_path() . '/app/public/generate')){
            Storage::makeDirectory('public/generate');
        }

        if(file_exists(storage_path() . '/app/public/generate/DIP-' . time() . '.pdf')){
            unlink(storage_path() . '/app/public/generate/DIP-' . time() . '.pdf');
        }

        $input = public_path() . '/report/jrxml/dip.jrxml';
        $output = storage_path() . '/app/public/generate/DIP-' . time();

        $jasperstarter = public_path() . '/report/ireport/lib/jasperstarter.jar';

        $parameter = '';

        if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('adminskpd')){
            $parameter .= 'idSkpd=0';
        } else {
            $parameter .= 'idSkpd=' . Auth::user()->id;
        }

        $database = 'mysql -H ' . Config::get('database.connections.mysql.host') . ' -u ' . Config::get('database.connections.mysql.username') . ' -p ' . Config::get('database.connections.mysql.password') . ' -n ' . Config::get('database.connections.mysql.database');

        exec("java -jar ".  $jasperstarter . " pr " . $input . " -o " . $output . " -f pdf -P " . $parameter . " -t " . $database);

        alert()->success('Dokumen berhasil di generate!');
        return response()->download($output . ".pdf");
    }

    public function printdipexcel()
    {
        if(!file_exists(storage_path() . '/app/public/generate')){
            Storage::makeDirectory('public/generate');
        }

        if(file_exists(storage_path() . '/app/public/generate/DIP-' . time() . '.xlsx')){
            unlink(storage_path() . '/app/public/generate/DIP-' . time() . '.xlsx');
        }

        $input = public_path() . '/report/jrxml/dip.jrxml';
        $output = storage_path() . '/app/public/generate/DIP-' . time();

        $jasperstarter = public_path() . '/report/ireport/lib/jasperstarter.jar';

        $parameter = '';

        if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('adminskpd')){
            $parameter .= 'idSkpd=0';
        } else {
            $parameter .= 'idSkpd=' . Auth::user()->id;
        }

        $database = 'mysql -H ' . Config::get('database.connections.mysql.host') . ' -u ' . Config::get('database.connections.mysql.username') . ' -p ' . Config::get('database.connections.mysql.password') . ' -n ' . Config::get('database.connections.mysql.database');

        exec("java -jar ".  $jasperstarter . " pr " . $input . " -o " . $output . " -f xlsx -P " . $parameter . " -t " . $database);

        alert()->success('Dokumen berhasil di generate!');
        return response()->download($output . ".xlsx");
    }

    public function menungguverifikasi(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if(Auth::user()->hasRole('superadmin')) {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where('dip.statusDokumen', 'like', '%menunggu verifikasi%')
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();
            } else {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([['dip.idSkpd', '=', Auth::user()->idSKPD], ['dip.statusDokumen', 'like', '%menunggu verifikasi%']])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('judul', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank'>". $baris->judul ."</a>";

                        return $href;
                    })
                    ->addColumn('penerbit', function($baris){
                        $data = $baris->skpd . '<br>' . $baris->created_at . '<br>' . $baris->name;

                        return $data;
                    })
                    ->addColumn('action', function($row){

                           $btn = "<a href=". route('dip.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("dip.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";
                           if(Auth::user()->hasRole('superadmin')) {
                                $btn .= "<a href=". route('dip.show', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                           }
                            return $btn;
                    })
                    ->rawColumns(['action', 'judul', 'penerbit'])
                    ->make(true);
        }

        return view('dip.menungguverifikasi');
    }

    public function ditolak(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if(Auth::user()->hasRole('superadmin')) {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where('dip.statusDokumen', 'like', '%ditolak%')
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','desc')
                        ->get();
            } else {
                $data = DIP::leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('tipefile', 'tipefile.id', '=', 'dip.idTipeFile')
                        ->leftJoin('users', 'users.id', '=', 'dip.idUsers')
                        ->leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'dip.id')
                        ->select('skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipeFile', 'users.name', 'dip.*', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                        ->where([['dip.idSkpd', '=', Auth::user()->idSKPD], ['dip.statusDokumen', 'like', '%ditolak%']])
                        ->groupBy('informasidiunduh.idDip', 'skpd.skpd', 'kategori.kategori', 'jenis.jenis', 'tipefile.tipefile', 'users.name', 'dip.id', 'dip.judul', 'dip.idSkpd', 'dip.kandunganInformasi', 'dip.idKategori', 'dip.idJenis', 'dip.idTipeFile', 'dip.file', 'dip.statusDokumen', 'dip.keterangan', 'dip.idUsers', 'dip.created_at', 'dip.updated_at', 'dip.tahun')
                        ->orderBy('dip.created_at','asc')
                        ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('judul', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank'>". $baris->judul ."</a>";

                        return $href;
                    })
                    ->addColumn('penerbit', function($baris){
                        $data = $baris->skpd . '<br>' . $baris->created_at . '<br>' . $baris->name;

                        return $data;
                    })
                    ->addColumn('action', function($row){

                           $btn = "<a href=". route('dip.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("dip.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";
                           if(Auth::user()->hasRole('superadmin')) {
                                $btn .= "<a href=". route('dip.show', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                           }
                            return $btn;
                    })
                    ->rawColumns(['action', 'judul', 'penerbit'])
                    ->make(true);
        }

        return view('dip.ditolak');
    }
}
