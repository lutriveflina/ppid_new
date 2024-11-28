<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::leftJoin('informasidiunduh', 'informasidiunduh.idDip', '=', 'page.id')
                    ->select('page.id', 'page.uraian', 'page.klasifikasi', 'page.file', DB::raw('COUNT(informasidiunduh.idDip) AS jml_diunduh'))
                    ->groupBy('informasidiunduh.idDip', 'page.id', 'page.file', 'page.klasifikasi', 'page.created_at', 'page.updated_at', 'page.uraian')
                    ->orderBy('page.created_at','asc')
                    ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('klasifikasi', function($baris){
                        $href = "<a href='". Storage::url($baris->file) ."' target='blank'>". $baris->klasifikasi ."</a>";

                        return $href;
                    })
                    ->addColumn('action', function($row){

                           $btn = "<a href=". route('page.edit', $row->id) ." class='btn btn-icon btn-outline-warning mr-1 mb-1 btn-sm' title='Edit'><i class='feather icon-edit-1'></i></a>";
                           $btn .= "<form action=". route("page.destroy", $row->id) ." class='pull-right delete-form' method='POST'>
                           <input type='hidden' name='_method' value='DELETE'>
                           <input type='hidden' name='_token' value=". Session::token() .">
                           <button type='submit' class='btn btn-icon btn-outline-danger mr-1 mb-1 btn-sm' title='Delete'><i class='feather icon-trash-2'></i></button>
                           </form>";

                            return $btn;
                    })
                    ->rawColumns(['action', 'klasifikasi'])
                    ->make(true);
        }

        return view('page.index');
    }

    public function create()
    {
        return view('page.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            'klasifikasi' => 'required|string',
            'uraian' => 'nullable|string'
        ]);

        if($validator->passes()){
            $page = new Page();

            $page->uraian = $request->uraian;

            $file = $request->file('file');
            $path_file = $file->store('public/files/page/' . $file->getClientOriginalExtension());
            $page->file = $path_file;

            $page->klasifikasi = $request->klasifikasi;

            $page->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    public function edit($id)
    {
        $page = Page::where('id', $id)->first();

        return view('page.edit', ['page' => $page]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            'klasifikasi' => 'required|string',
            'uraian' => 'nullable|string'
        ]);

        if($validator->passes()){
            $page = Page::where('id', $id)->first();

            $page->uraian = $request->uraian;

            if ($request->file('file') != '') {
                Storage::delete($page->file);

                $file = $request->file('file');
                $path_file = $file->store('public/files/page/' . $file->getClientOriginalExtension());
                $page->file = $path_file;
            } else {
                $page->file = $page->file;
            }

            $page->klasifikasi = $request->klasifikasi;

            $page->save();

            return redirect()->back()->with(['success' => 'Data berhasil disimpan!']);
        }

        return redirect()->back()->withErrors($validator);
    }

    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();

        Storage::delete($page->file);

        $page->delete();

        return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
    }

    public function indexProfil()
    {
        return view('page.profil.profil');
    }
}
