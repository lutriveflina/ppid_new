<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Keberatan;
use App\PermohonanInformasi;
use App\SKPD;
use App\StatusPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if (Auth::user()->hasRole('superadmin')) {
                $data = Keberatan::join('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'keberatan.id')
                    ->join('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->join('permohonaninformasisss', 'permohonaninformasisss.id', '=', 'keberatan.idPermohonanInformasi')
                    ->select('keberatan.id', 'keberatan.nomorRegistrasi', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'keberatan.created_at', 'keberatan.tanggapan', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.jenisPermohonan', '=', 'KEBERATAN']
                    ])
                    ->get();
            } else {
                $data = Keberatan::join('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'keberatan.id')
                    ->join('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->join('permohonaninformasisss', 'permohonaninformasisss.id', '=', 'keberatan.idPermohonanInformasi')
                    ->select('keberatan.id', 'keberatan.nomorRegistrasi', 'permohonaninformasisss.noPendaftaran', 'skpd.skpd', 'keberatan.created_at', 'keberatan.tanggapan', 'statuspermohonan.updated_at')
                    ->where([
                        ['statuspermohonan.idUsers', '=', Auth::user()->id],
                        ['statuspermohonan.jenisPermohonan', '=', 'KEBERATAN']
                    ])
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = "<a href=". url('keberatan/detail', $row->id) ." class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Detail'><i class='feather icon-eye'></i></a>";

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('keberatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skpd = SKPD::get();
        $permohonan = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                        ->select('permohonaninformasisss.id', 'permohonaninformasisss.noPendaftaran')
                        ->where([['statuspermohonan.idUsers', '=', Auth::user()->id], ['statuspermohonan.jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                        ->get();

        return view('keberatan.create', ['skpd' => $skpd, 'permohonan' => $permohonan]);
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
            'idPermohonanInformasi' => 'required|numeric',
            'alasanPengajuanKeberatan' => 'required|string',
            'kasusPosisi' => 'required|string',
            'idSkpd' => 'required|numeric',
        ]);

        if($validator->passes()){
            $keberatan = new Keberatan();

            $keberatan->idPermohonanInformasi = $request->idPermohonanInformasi;
            $keberatan->alasanPengajuanKeberatan = $request->alasanPengajuanKeberatan;
            $keberatan->kasusPosisi = $request->kasusPosisi;

            $keberatan->save();

            $statuspermohonan = new StatusPermohonan();

            $statuspermohonan->idPermohonan = $keberatan->id;
            $statuspermohonan->idSkpd = $request->idSkpd;
            $statuspermohonan->idUsers = Auth::user()->id;
            $statuspermohonan->status = '-';
            $statuspermohonan->jenisPermohonan = 'KEBERATAN';

            $statuspermohonan->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keberatan  $keberatan
     * @return \Illuminate\Http\Response
     */
    public function show(Keberatan $keberatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keberatan  $keberatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keberatan $keberatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keberatan  $keberatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keberatan $keberatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keberatan  $keberatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keberatan $keberatan)
    {
        //
    }

    public function detail($id)
    {
        $data = PermohonanInformasi::leftJoin('statuspermohonan', 'statuspermohonan.idPermohonan', '=', 'permohonaninformasisss.id')
                    ->leftJoin('skpd', 'skpd.id', '=', 'statuspermohonan.idSkpd')
                    ->leftJoin('users as u1', 'u1.id', '=', 'statuspermohonan.idUsers')
                    ->leftJoin('keberatan', 'keberatan.idPermohonanInformasi', '=', 'permohonaninformasisss.id')
                    ->select(
                        'keberatan.id', 'keberatan.nomorRegistrasi', 'permohonaninformasisss.noPendaftaran',
                        'permohonaninformasisss.tujuanPenggunaanInformasi', 'u1.name as namaPemohon', 'u1.alamat', 'u1.email', 'u1.noKontak', 'u1.provinsi',
                        'u1.kabKot', 'keberatan.alasanPengajuanKeberatan', 'keberatan.kasusPosisi', 'keberatan.tanggapan', 'skpd.skpd',
                        'keberatan.created_at', 'keberatan.updated_at'
                    )
                    ->where('keberatan.id', '=', $id)
                    ->first();

        return view('keberatan.detail', ['data' => $data]);
    }

    public function tanggapan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggapan' => 'required|date_format:"Y-m-d"',
        ]);

        if($validator->passes()) {
            $statuspermohonan = StatusPermohonan::where('idPermohonan', '=', $id)->first();

            $statuspermohonan->idPetugas = Auth::user()->id;

            $statuspermohonan->save();

            $keberatan = Keberatan::where('id', '=', $id)->first();

            $keberatan->tanggapan = $request->tanggapan;

            $keberatan->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }
}
