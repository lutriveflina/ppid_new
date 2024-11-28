<?php

namespace App\Http\Controllers;

use App\PermohonanInformasi;
use App\SKPD;
use App\StatusPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PermohonanInformasiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin|adminskpd|pengunjung']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.idUsers', '=', Auth::user()->id],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI']
                    ])
                    ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //    $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                            
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skpd = SKPD::get();

        return view('permohonaninformasisss.create', ['skpd' => $skpd]);
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
            'rincianInformasi' => 'required|string',
            'tujuanPenggunaanInformasi' => 'required|string',
            'idSkpd' => 'required|numeric',
            'caraMemperolehInformasi' => 'required|string',
            'caraMendapatkanSalinanInformasi' => 'required|string',
            'skPendirian' => 'nullable|mimes:doc,docx,jpeg,jpg,png,pdf|max:5120',
        ]);

        if($validator->passes()){
            $permohonaninformasisss = new PermohonanInformasi();

            $permohonaninformasisss->rincianInformasi = $request->rincianInformasi;
            $permohonaninformasisss->tujuanPenggunaanInformasi = $request->tujuanPenggunaanInformasi;
            $permohonaninformasisss->caraMemperolehInformasi = $request->caraMemperolehInformasi;
            $permohonaninformasisss->caraMendapatkanSalinanInformasi = $request->caraMendapatkanSalinanInformasi;

            if($request->file('skPendirian') != '') {
                $skPendirian = $request->file('skPendirian');
                $path_skPendirian = $skPendirian->store('public/files/skPendirian/' . $skPendirian->getClientOriginalExtension());
                $permohonaninformasisss->skPendirian = $path_skPendirian;
            } else {
                $permohonaninformasisss->skPendirian = '-';
            }

            $permohonaninformasisss->save();

            $statuspermohonan = new StatusPermohonan();

            $statuspermohonan->idPermohonan = $permohonaninformasisss->id;
            $statuspermohonan->idSkpd = $request->idSkpd;
            $statuspermohonan->idUsers = Auth::user()->id;
            $statuspermohonan->status = 'MENUNGGU VERIFIKASI PPID UTAMA';
            $statuspermohonan->jenisPermohonan = 'PERMOHONAN INFORMASI';

            $statuspermohonan->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\permohonaninformasisss  $permohonaninformasisss
     * @return \Illuminate\Http\Response
     */
    public function show(permohonaninformasisss $permohonaninformasisss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\permohonaninformasisss  $permohonaninformasisss
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\permohonaninformasisss  $permohonaninformasisss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\permohonaninformasisss  $permohonaninformasisss
     * @return \Illuminate\Http\Response
     */

    public function detail($id)
    {
        $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->leftJoin('users as u1', 'u1.id', '=', 'statuspermohonan.idUsers')
                    ->leftJoin('users as u2', 'u2.id', '=', 'statuspermohonan.idPetugas')
                    ->select(
                        'permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'permohonaninformasisss.rincianInformasi',
                        'permohonaninformasisss.tujuanPenggunaanInformasi', 'permohonaninformasisss.caraMemperolehInformasi',
                        'permohonaninformasisss.caraMendapatkanSalinanInformasi', 'permohonaninformasisss.skPendirian', 'skpd.skpd',
                        'u1.name as namaPemohon', 'u2.name as namaPetugas', 'u1.nik', 'u1.alamat', 'u1.provinsi', 'u1.kabKot', 'u1.noKontak', 'u1.email',
                        'statuspermohonan.status', 'statuspermohonan.alasan', 'statuspermohonan.created_at', 'statuspermohonan.updated_at'
                    )
                    ->where('permohonaninformasisss.id', '=', $id)
                    ->first();

        return view('permohonaninformasisss.detail', ['data' => $data]);
    }

    public function latest(Request $request)
    {
        if ($request->ajax()) {
            $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'MENUNGGU VERIFIKASI PPID UTAMA'],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI']
                    ])
                    ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //  $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                            // $btn .= "<form action=". route("permohonaninformasisss.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                            // <input type='hidden' name='_method' value='DELETE'>
                            // <input type='hidden' name='_token' value=". Session::token() .">
                            // <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                            // </form>";

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.latest');
    }

    public function verifikasi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string',
            'alasan' => 'nullable|string',
        ]);

        if($validator->passes()) {
            $statuspermohonan = StatusPermohonan::where('idPermohonan', '=', $id)->first();

            $statuspermohonan->status = $request->status;
            $statuspermohonan->alasan = $request->alasan;
            $statuspermohonan->idPetugas = Auth::user()->id;

            $statuspermohonan->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    public function disposisi(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if (Auth::user()->hasRole('superadmin')) {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'DISPOSISI'],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            } else {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'DISPOSISI'],
                        ['statuspermohonan.idSkpd', '=', Auth::user()->idSKPD],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //    $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.disposisi');
    }

    public function diproses(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if (Auth::user()->hasRole('superadmin')) {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'DIPROSES'],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            } else {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'DIPROSES'],
                        ['statuspermohonan.idSkpd', '=', Auth::user()->idSKPD],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //    $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                        //    $btn .= "<form action=". route("permohonaninformasisss.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                        //    <input type='hidden' name='_method' value='DELETE'>
                        //    <input type='hidden' name='_token' value=". Session::token() .">
                        //    <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                        //    </form>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.diproses');
    }

    public function selesai(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if (Auth::user()->hasRole('superadmin')) {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'SELESAI'],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            } else {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'SELESAI'],
                        ['statuspermohonan.idSkpd', '=', Auth::user()->idSKPD],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //    $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.selesai');
    }

    public function ditolak(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if (Auth::user()->hasRole('superadmin')) {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'DITOLAK'],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            } else {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.status', '=', 'DITOLAK'],
                        ['statuspermohonan.idSkpd', '=', Auth::user()->idSKPD],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //    $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.ditolak');
    }

    public function semuapermohonan(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if (Auth::user()->hasRole('superadmin')) {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            } else {
                $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'permohonaninformasisss.created_at', 'statuspermohonan.status', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.idSkpd', '=', Auth::user()->idSKPD],
                        ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI'],
                    ])
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('permohonaninformasisss/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";
                        //    $btn .= "<a href=". route('permohonaninformasisss.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                        //    $btn .= "<form action=". route("permohonaninformasisss.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                        //    <input type='hidden' name='_method' value='DELETE'>
                        //    <input type='hidden' name='_token' value=". Session::token() .">
                        //    <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                        //    </form>";

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('permohonaninformasisss.semuapermohonan');
    }

    public function destroy($id)
    {
        $permohonaninformasisss = PermohonanInformasi::where('id', $id)->first();

        $permohonaninformasisss->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
