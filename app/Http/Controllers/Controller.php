<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Produk;
use App\Models\Iklan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getWilayahData()
    {
        // $wilayahProvinsi = DB::table('wilayah_provinsi')->count();
        // $wilayahKabupaten = DB::table('wilayah_kabupaten')->count();
        // $wilayahKecamatan = DB::table('wilayah_kacamatan')->count();
        // $wilayahKelurahan = DB::table('wilayah_kelurahan')->count();

        // return [
        //     'provinsi' => $wilayahProvinsi,
        //     'kabupaten' => $wilayahKabupaten,
        //     'kecamatan' => $wilayahKecamatan,
        //     'kelurahan' => $wilayahKelurahan,
        // ];

        $wilayahProvinsiData = DB::table('wilayah_provinsi')->select('nama')->get();
        $Count_data =
            DB::table('wilayah_provinsi')
            ->leftJoin('users_ads', 'wilayah_provinsi.nama', '=', 'users_ads.provinsi')
            ->select(DB::raw('COUNT(users_ads.id) as user_count'))
            ->groupBy('wilayah_provinsi.nama')
            ->get();
        $wilayahProvinsiCount = $wilayahProvinsiData->count();

        return [
            'provinsi' => [
                'count' => $wilayahProvinsiCount,
                'color' => 'blue',
                'data' => $wilayahProvinsiData,
                'count_data' => $Count_data->pluck('user_count'),
            ],
        ];
    }
    public function index()
    {
        // Data for line chart (user registrations by month)
        $userRegistrations = DB::table('users_ads')
            ->select(DB::raw('MONTHNAME(tgl_daftar) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('tgl_daftar')
            ->get();

        // Data for line chart (user registrations by month) for 'Petani'
        $userRegistrationsPetani = DB::table('users_ads')
            ->select(DB::raw('MONTHNAME(tgl_daftar) as month'), DB::raw('COUNT(*) as count'))
            ->where('profesi', 'Petani')
            ->groupBy('month')
            ->orderBy('tgl_daftar')
            ->get();

        // Data for line chart (user registrations by month) for 'Pedagang'
        $userRegistrationsPedagang = DB::table('users_ads')
            ->select(DB::raw('MONTHNAME(tgl_daftar) as month'), DB::raw('COUNT(*) as count'))
            ->where('profesi', 'Pedagang')
            ->groupBy('month')
            ->orderBy('tgl_daftar')
            ->get();

        // Data for pie chart (advertisement statistics)
        $advertisementStats = DB::table('produks')
            ->select('kategori', DB::raw('COUNT(*) as count'))
            ->groupBy('kategori')
            ->get();

        $wilayahData = $this->getWilayahData();

        // var_dump($userRegistrations);


        return view('dashboard', compact('userRegistrations', 'userRegistrationsPetani', 'userRegistrationsPedagang', 'advertisementStats', 'wilayahData'));
    }

    public function login()
    {
        return view('Login');
    }

    public function getLogin(Request $request)
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        $loginType = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $loginType => $request->input('email')
        ]);

        if (Auth::attempt($request->only($loginType, 'password'))) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
