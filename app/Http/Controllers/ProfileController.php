<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits_between:16,18',
            'name' => 'required|string',
            'alamat' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kabKot' => 'nullable|string',
            // 'email' => 'required|string|email',
            'noKontak' => 'nullable|numeric',
            'password' => 'nullable|string|min:8'
        ]);

        if($validator->passes()){
            $user = User::where('id', $id)->first();

            $user->nik = $request->nik;
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->provinsi = $request->provinsi;
            // $user->email = $request->email;
            $user->noKontak = $request->noKontak;

            if ($request->password != '') {
                $user->password = Hash::make($request->password);
            } else {
                $user->password = $user->password;
            }

            $user->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
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
