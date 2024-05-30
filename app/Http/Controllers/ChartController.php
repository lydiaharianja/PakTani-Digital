<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function registeredUsersChart()
    {

        $registrations = User::select(DB::raw("MONTHNAME(tgl_daftar) as month_name"), DB::raw('count(*) as total'))
            ->groupBy('month_name')
            ->get();


        $data = $registrations->pluck('total');

        return view('Dashboard', compact('data'));
    }

    // public function adStatisticsChart()
    // {
    //     $category = Produk::whereIn('kategori', ['pertanian', 'pertenakan', 'peralatan'])
    //         ->select('kategori', DB::raw('COUNT(id) as count'))
    //         ->groupBy('kategori')
    //         ->get();

    //     return view('Dashboard', compact('category'));
    // }

    // public function agricultureStatisticsChart()
    // {
    //     $agricultureStats = Agriculture::select('region', 'production')
    //         ->get();

    //     $labels = $agricultureStats->pluck('region');
    //     $data = $agricultureStats->pluck('production');

    //     return view('agriculture_chart', compact('labels', 'data'));
    // }


}