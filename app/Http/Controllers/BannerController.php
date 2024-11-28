<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
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
            $data = Banner::get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('judul', function($baris){
                        $href = "<a href='". Storage::url($baris->gambar) ."' target='blank'>". $baris->judul ."</a>";

                        return $href;
                    })
                    ->addColumn('action', function($row){

                           $btn = "<a href=". route('banner.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("banner.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";

                            return $btn;
                    })
                    ->rawColumns(['action', 'judul'])
                    ->make(true);
        }

        
        return view('banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'judul' => 'required|string',
            'text' => 'required|string',
            'klasifikasi' => 'required|string'
        ]);

        if($validator->passes()){
            $banner = new Banner();

            $gambar = $request->file('gambar');
            $path_gambar = $gambar->store('public/files/banner/jpeg/' . $gambar->getClientOriginalExtension());
            $banner->gambar = $path_gambar;

            $banner->judul = $request->judul;
            $banner->text = $request->text;
            $banner->klasifikasi = $request->klasifikasi;

            $banner->save();

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
        $banner = Banner::where('id', $id)->first();

        return view('banner.edit', ['banner' => $banner]);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required|string',
            'text' => 'required|string',
            'klasifikasi' => 'required|string'
        ]);

        if($validator->passes()){
            $banner = Banner::where('id', $id)->first();

            if ($request->file('gambar') != '') {
                Storage::delete($banner->gambar);

                $gambar = $request->file('gambar');
                $path_gambar = $gambar->store('public/files/banner/' . $gambar->getClientOriginalExtension());
                $banner->gambar = $path_gambar;
            } else {
                $banner->gambar = $banner->gambar;
            }

            $banner->judul = $request->judul;
            $banner->text = $request->text;
            $banner->klasifikasi = $request->klasifikasi;

            $banner->save();

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
        $banner = Banner::where('id', $id)->first();

        Storage::delete($banner->gambar);

        $banner->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
