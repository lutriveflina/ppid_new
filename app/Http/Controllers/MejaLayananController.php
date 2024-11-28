<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\PermohonanInformasi;
use App\SKPD;
use App\StatusPermohonan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MejaLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skpd = SKPD::get();

        return view('mejalayanan.create', ['skpd' => $skpd]);
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
            'nik' => 'required|numeric|digits_between:16,18|unique:users',
            'name' => 'required|string',
            'idSKPD' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kabKot' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'noKontak' => 'nullable|numeric',
            'password' => 'required|string|min:8'
        ]);

        if($validator->passes()){
            $user = new User();

            $user->nik = $request->nik;
            $user->name = $request->name;
            $user->idSKPD = $request->idSKPD;
            $user->alamat = $request->alamat;
            $user->provinsi = $request->provinsi;
            $user->email = $request->email;
            $user->noKontak = $request->noKontak;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = date('Y-m-d H:i:s');

            $user->save();

            $user->assignRole('pengunjung');
            
            $permohonaninformasisss = new PermohonanInformasi();
            
            $permohonaninformasisss->rincianInformasi = $request->rincianInformasi;
            $permohonaninformasisss->tujuanPenggunaanInformasi = $request->tujuanPenggunaanInformasi;
            $permohonaninformasisss->caraMemperolehInformasi = $request->caraMemperolehInformasi;
            $permohonaninformasisss->caraMendapatkanSalinanInformasi = $request->caraMendapatkanSalinanInformasi;

            $permohonaninformasisss->save();

            $statuspermohonan = new StatusPermohonan();

            $statuspermohonan->idPermohonan = $permohonaninformasisss->id;
            $statuspermohonan->idSkpd = $request->idSkpd;
            $statuspermohonan->idUsers = $user->id;
            $statuspermohonan->idPetugas = Auth::user()->id;
            $statuspermohonan->status = 'SELESAI';
            $statuspermohonan->jenisPermohonan = 'PERMOHONAN INFORMASI';

            $statuspermohonan->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
