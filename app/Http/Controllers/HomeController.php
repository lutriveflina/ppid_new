<?php

namespace App\Http\Controllers;

use App\informasiDiUnduh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('superadmin')) {
            return redirect()->route('permohonaninformasisss.latest');
        }elseif(Auth::user()->hasRole('adminskpd')) {
            return redirect()->route('permohonaninformasisss.disposisi');
        }else{
            return redirect()->to('informasidiunduh');
        }

        // return view('home');
    }

    public function informasidiunduh(Request $request)
    {
        if ($request->ajax()) {
            $data = '';

            if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('adminskpd')){
                $data = informasiDiUnduh::leftJoin('dip', 'dip.id', '=', 'informasidiunduh.idDip')
                        ->leftJoin('users', 'users.id', '=', 'informasidiunduh.idUsers')
                        ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                        ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                        ->leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                        ->select('dip.judul', 'kategori.kategori', 'jenis.jenis', 'skpd.skpd', 'users.name', 'informasidiunduh.created_at')
                        ->orderBy('informasidiunduh.created_at', 'ASC')
                        ->get();
            } else {
                $data = informasiDiUnduh::leftJoin('dip', 'dip.id', '=', 'informasidiunduh.idDip')
                    ->leftJoin('users', 'users.id', '=', 'informasidiunduh.idUsers')
                    ->leftJoin('kategori', 'kategori.id', '=', 'dip.idKategori')
                    ->leftJoin('jenis', 'jenis.id', '=', 'dip.idJenis')
                    ->leftJoin('skpd', 'skpd.id', '=', 'dip.idSkpd')
                    ->select('dip.judul', 'kategori.kategori', 'jenis.jenis', 'skpd.skpd', 'users.name', 'informasidiunduh.created_at')
                    ->where('informasidiunduh.idUsers', '=', Auth::user()->id)
                    ->orderBy('informasidiunduh.created_at', 'ASC')
                    ->get();
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('dip.informasidiunduh');
    }

    public function printinformasidiunduhpdf()
    {
        if(!file_exists(storage_path() . '/app/public/generate')){
            Storage::makeDirectory('public/generate');
        }

        if(file_exists(storage_path() . '/app/public/generate/informasidiunduh-' . time() . '.pdf')){
            unlink(storage_path() . '/app/public/generate/informasidiunduh-' . time() . '.pdf');
        }

        $input = public_path() . '/report/jrxml/informasidiunduh.jrxml';
        $output = storage_path() . '/app/public/generate/informasidiunduh-' . time();

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

    public function printinformasidiunduhexcel()
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

    public function anggotaforum()
    {
        return view('anggotaforum');
    }

    public function feedback()
    {
        return view('feedback.feedback');
    }
}
