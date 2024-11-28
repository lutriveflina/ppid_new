<?php

namespace App\Http\Controllers;

use App\SKPD;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::leftJoin('skpd', 'users.idSKPD', '=', 'skpd.id')
                    ->select('skpd.skpd', 'users.nik', 'users.name', 'users.email', 'users.noKontak', 'users.id')
                    ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = "<a href=". route('petugas.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("petugas.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('petugas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skpd = SKPD::get();
        $roles = Role::get();

        return view('petugas.create', ['skpd' => $skpd, 'roles' => $roles]);
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
            'nik' => 'required|numeric|digits_between:16,18|unique:users',
            'name' => 'required|string',
            'idSKPD' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kabKot' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'noKontak' => 'nullable|numeric',
            'role' => 'required|string',
            'password' => 'required|string|min:8'
        ]);

        if($validator->passes()){
            $petugas = new User();

            $petugas->nik = $request->nik;
            $petugas->name = $request->name;
            $petugas->idSKPD = $request->idSKPD;
            $petugas->alamat = $request->alamat;
            $petugas->provinsi = $request->provinsi;
            $petugas->email = $request->email;
            $petugas->noKontak = $request->noKontak;
            $petugas->password = Hash::make($request->password);
            $petugas->email_verified_at = date('Y-m-d H:i:s');

            $petugas->save();

            $petugas->assignRole($request->role);

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = User::where('id', $id)->first();
        $skpd = SKPD::get();
        $roles = Role::get();

        return view('petugas.edit', ['petugas' => $petugas, 'skpd' => $skpd, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits_between:16,18',
            'name' => 'required|string',
            'idSKPD' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kabKot' => 'nullable|string',
            'email' => 'required|string|email',
            'noKontak' => 'nullable|numeric',
            'role' => 'required|string',
            'password' => 'nullable|string|min:8'
        ]);

        if($validator->passes()){
            $petugas = User::where('id', $id)->first();

            $petugas->nik = $request->nik;
            $petugas->name = $request->name;
            $petugas->idSKPD = $request->idSKPD;
            $petugas->alamat = $request->alamat;
            $petugas->provinsi = $request->provinsi;
            $petugas->email = $request->email;
            $petugas->noKontak = $request->noKontak;
            
            if ($request->password != '') {
                $petugas->password = Hash::make($request->password);
            } else {
                $petugas->password = $petugas->password;
            }

            $petugas->save();

            $petugas->assignRole($request->role);
            
            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SKPD  $sKPD
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = User::where('id', $id)->first();

        $petugas->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
