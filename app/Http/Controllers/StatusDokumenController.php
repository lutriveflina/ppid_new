<?php

namespace App\Http\Controllers;

use App\StatusDokumen;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class StatusDokumenController extends Controller
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
            $data = StatusDokumen::get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = "<a href=". route('statusdokumen.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("statusdokumen.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('statusdokumen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusdokumen.create');
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
            'statusDokumen' => 'required|string',
        ]);

        if($validator->passes()){
            $statusdokumen = new StatusDokumen();

            $statusdokumen->statusDokumen = $request->statusDokumen;

            $statusdokumen->save();

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
        $statusdokumen = StatusDokumen::where('id', $id)->first();

        return view('statusdokumen.edit', ['statusdokumen' => $statusdokumen]);
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
            'statusDokumen' => 'required|string',
        ]);

        if($validator->passes()){
            $statusdokumen = StatusDokumen::where('id', $id)->first();

            $statusdokumen->statusDokumen = $request->statusDokumen;

            $statusdokumen->save();

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
        $statusdokumen = StatusDokumen::where('id', $id)->first();

        $statusdokumen->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
