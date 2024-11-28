<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $totalDIP = DB::table('dip')->select(DB::raw('COUNT(id) AS totalDIP'))->first();

        $totalPermohonan = DB::table('statuspermohonan')
                            ->select(DB::raw('COUNT(id) AS totalPermohonan'))
                            ->where([['status', 'SELESAI'], ['jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                            ->first();

        $totalUnduhan = DB::table('informasidiunduh')->select(DB::raw('COUNT(id) AS totalUnduhan'))->first();

        $visit_today = DB::table('laravel_logger_activity')
                        ->select(DB::raw('COUNT(*) AS visit_today'))
                        ->where('description' , '=', 'Viewed /')
                        ->whereDate('created_at', Carbon::today())
                        ->first();

        $visit_yerterday = DB::table('laravel_logger_activity')
                        ->select(DB::raw('COUNT(*) AS visit_yerterday'))
                        ->where('description' , '=', 'Viewed /')
                        ->whereDate('created_at', Carbon::yesterday())
                        ->first();

        $visit_total = DB::table('laravel_logger_activity')
                        ->select(DB::raw('COUNT(*) AS visit_total'))
                        ->where([
                            ['description' , '=', 'Viewed /']
                        ])
                        ->first();

        $menunggu_verifikasi = DB::table('statuspermohonan')
                                ->select(DB::raw('COUNT(id) AS totalPermohonan'))
                                ->where([['status', 'MENUNGGU VERIFIKASI PPID UTAMA'], ['jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                                ->first();

        $disposisi = DB::table('statuspermohonan')
                                ->select(DB::raw('COUNT(id) AS totalPermohonan'))
                                ->where([['status', 'DISPOSISI'], ['jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                                ->first();

        $ditolak = DB::table('statuspermohonan')
                                ->select(DB::raw('COUNT(id) AS totalPermohonan'))
                                ->where([['status', 'DITOLAK'], ['jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                                ->first();

        $diproses = DB::table('statuspermohonan')
                                ->select(DB::raw('COUNT(id) AS totalPermohonan'))
                                ->where([['status', 'DIPROSES'], ['jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                                ->first();

        $selesai = DB::table('statuspermohonan')
                                ->select(DB::raw('COUNT(id) AS totalPermohonan'))
                                ->where([['status', 'SELESAI'], ['jenisPermohonan', '=', 'PERMOHONAN INFORMASI']])
                                ->first();


        view()->share([
            'totalDIP' => $totalDIP,
            'totalPermohonan' => $totalPermohonan,
            'totalUnduhan' => $totalUnduhan,
            'visit_today' => $visit_today,
            'visit_yerterday' => $visit_yerterday,
            'visit_total' => $visit_total,
            'menunggu_verifikasi' => $menunggu_verifikasi,
            'disposisi' => $disposisi,
            'ditolak' => $ditolak,
            'diproses' => $diproses,
            'selesai' => $selesai
        ]);
    }
}
