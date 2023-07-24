<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Keluhan;
use App\Models\KetuaRT;
use App\Models\KetuaRw;
use App\Models\Kematian;
use App\Models\Penduduk;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    function index()
    {
        $data_galeri = Gallery::orderBy('created_at', 'desc')->get();
        $data_berita = Post::orderBy('posts.created_at', 'desc')->take(2)->get();
        return view('user/index', compact('data_galeri','data_berita'));
    }

    function profil()
    {
        return view('user/profil');
    }

    function keluhan()
    {
        $data_rw = KetuaRw::all();
        $data_keluhan = Keluhan::orderBy('keluhan.created_at', 'desc')->get();
        return view('user/keluhan', compact('data_rw', 'data_keluhan'));
    }
    function tambah_keluhan(Request $request)
    {
        Keluhan::create([
            "nama_pengirim" => $request->input('nama'),
            "keluhan" => $request->input('keluhan'),
            "id_rw" => $request->input('rw'),
            "status" => "Baru"
        ]);
        Session::flash('berhasil', 'Keluhan Anda berhasil ditambahkan!');
        return redirect(url('keluhan'));
    }
    function penduduk()
    {
        $data_rw = KetuaRw::orderBy('rw', 'asc')->get();
        $data_rt = KetuaRT::orderBy('rt', 'asc')->get();
        $data_penduduk = Penduduk::join('ketua_rw', 'ketua_rw.id', '=', 'penduduks.id_rw')
                ->join('ketua_r_t_s', 'ketua_r_t_s.id', '=', 'penduduks.id_rt')
                ->select('ketua_rw.*', 'ketua_r_t_s.*', 'penduduks.*')
                ->orderBy('ketua_rw.rw', 'asc')
                ->orderBy('ketua_r_t_s.rt', 'asc')
                ->get();
        return view('user/data-penduduk', compact('data_rt', 'data_rw', 'data_penduduk'));
    }
    function kematian()
    {
        $data_kematian = Kematian::orderBy('kematians.created_at', 'desc')->get();
        return view('user/data-kematian', compact('data_kematian'));
    }
}
