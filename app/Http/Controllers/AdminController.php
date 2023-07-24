<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\KetuaRw;
use App\Models\Keluhan;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Kematian;
use App\Models\Penduduk;
use App\Models\KetuaRT;


class AdminController extends Controller
{
    function login(Request $request)
    {
        if ($request->session()->has('id') != "") {
            return redirect(url('admin/dashboard'));
        } else {
            return view('admin/login');
        }
    }
    function auth_login(Request $request)
    {
        $validate_admin = User::where('name', $request->input('nama_admin'))
            ->first();

        if ($validate_admin) {
            if (Hash::check($request->input('kata_sandi'), $validate_admin->password)) {
                Auth::loginUsingId($validate_admin->id);
                $request->session()->put('id', $validate_admin->id);
                $validate_admin->updated_at = now();
                $validate_admin->save();
                return redirect(url('admin/dashboard'));
            } else {
                Session::flash('gagal', 'Nama atau Password salah.');
                return redirect(url('log-in'));
            }
        } else {
            Session::flash('gagal', 'Nama atau Password salah.');
            return redirect(url('log-in'));
        }
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('id');

        return redirect(url('/'));
    }
    function admin(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_keluhan = Keluhan::join('ketua_rw', 'ketua_rw.id', '=', 'keluhan.id_rw')
                ->select('ketua_rw.*', 'keluhan.*')
                ->orderBy('keluhan.created_at', 'desc')
                ->take(5)
                ->get();
            $data_berita = Post::orderBy('posts.created_at', 'desc')->take(2)->get();
            return view('admin/index', compact('data_admin', 'data_keluhan', 'data_berita'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function keluhan(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            return view('admin/keluhan', compact('data_admin'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function rw(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_rw = KetuaRw::orderBy('rw', 'asc')->get();
            return view('admin/rw', compact('data_admin', 'data_rw'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function tambah_rw(Request $request)
    {
        KetuaRw::create([
            "rw" => $request->input('no_rw'),
            "nama_rw" => $request->input('nama_rw'),
            "no_hp" => $request->input('telpon_rw'),
            "alamat_rw" => $request->input('alamat_rw'),
        ]);
        return redirect(url('admin/rw'));
    }
    function edit_rw(Request $request, $id)
    {
        $data_rw = KetuaRw::find($id);
        if ($data_rw) {
            $data_rw->update([
                "rw" => $request->input('no_rw'),
                "nama_rw" => $request->input('nama_rw'),
                "no_hp" => $request->input('telpon_rw'),
                "alamat_rw" => $request->input('alamat_rw'),
            ]);
        }
        return redirect(url('admin/rw'));
    }
    function hapus_rw($id)
    {
        $data_rw = KetuaRw::find($id);
        $data_rw->delete();
        return redirect(url('admin/rw'));
    }
    function adm_berita(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_berita = Post::orderBy('posts.created_at', 'desc')->get();
            return view('admin/berita', compact('data_admin', 'data_berita'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function newpost(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            return view('admin/newpost', compact('data_admin'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function tambah_berita(Request $request)
    {
        $message = [
            'body' => 'Wajib Diisi!',
        ];

        $request->validate([
            'body' => 'required',

        ], $message);
        $slug = Str::slug($request->judul);
        if ($request->img != "") {
            $nama_aset = $request->img->getClientOriginalName() . '-' . time() . '.' . $request->img->extension();
            $request->img->move(public_path('berita'), $nama_aset);
        }
        Post::create([
            "title" => $request->input('judul'),
            "slug" => $slug,
            "author" => $request->input('penulis'),
            "excerpt" => Str::limit(strip_tags($request->body), 100, '...'),
            "body" => $request->input('body'),
            "img" => $nama_aset,
        ]);
        return redirect(url('admin/berita'));
    }
    function tampil_edit(Request $request, $id)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_berita = Post::find($id);
            return view('admin/editpost', compact('data_admin', 'data_berita'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function edit_berita(Request $request, $id)
    {
        $message = [
            'body' => 'Wajib Diisi!',
        ];

        $request->validate([
            'body' => 'required',

        ], $message);
        $data_berita = Post::find($id);
        $slug = Str::slug($request->judul);
        if ($request->img != "") {
            File::delete(public_path('berita/' . $data_berita->img));
            $nama_aset = $request->img->getClientOriginalName() . '-' . time() . '.' . $request->img->extension();
            $request->img->move(public_path('berita'), $nama_aset);
        } else {
            $nama_aset = $data_berita->img;
        }
        if ($data_berita) {
            $data_berita->update([
                "title" => $request->input('judul'),
                "slug" => $slug,
                "author" => $request->input('penulis'),
                "excerpt" => Str::limit(strip_tags($request->body), 100, '...'),
                "body" => $request->input('body'),
                "img" => $nama_aset,
            ]);
        }
        return redirect(url('admin/berita'));
    }
    function hapus_berita($id)
    {
        $data_berita = Post::find($id);
        $data_berita->delete();
        return redirect(url('admin/berita'));
    }
    function adm_keluhan(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_keluhan = Keluhan::join('ketua_rw', 'ketua_rw.id', '=', 'keluhan.id_rw')
                ->select('ketua_rw.*', 'keluhan.*')
                ->orderBy('keluhan.created_at', 'desc')
                ->get();
            return view('admin/keluhan', compact('data_admin', 'data_keluhan'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function edit_keluhan(Request $request, $id)
    {
        $data_keluhan = Keluhan::find($id);
        if ($data_keluhan) {
            $data_keluhan->update([
                "status" => $request->input('status'),
            ]);
        }
        return redirect(url('admin/keluhan'));
    }
    function hapus_keluhan($id)
    {
        $data_keluhan = Keluhan::find($id);
        $data_keluhan->delete();
        return redirect(url('admin/keluhan'));
    }
    function adm_galeri(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_galeri = Gallery::orderBy('galleries.updated_at', 'desc')->get();
            return view('admin/galeri', compact('data_admin', 'data_galeri'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function tambah_galeri(Request $request)
    {
        $cekKategori = substr($request->file('aset')->getMimeType(), 0, 5);
        if ($cekKategori == "image")
            $kategori = "Foto";
        else if ($cekKategori == "video")
            $kategori = "Video";

        if ($request->aset != "") {
            $nama_aset = $request->aset->getClientOriginalName() . '-' . time() . '.' . $request->aset->extension();
            $request->aset->move(public_path('aset'), $nama_aset);
        }

        Gallery::create([
            "sumber" => $nama_aset,
            "kategori" => $kategori,
            "judul" => $request->input('judul'),
        ]);
        return redirect(url('admin/galeri'));
    }
    function edit_galeri(Request $request, $id)
    {
        $data_galeri = Gallery::find($id);
        if ($request->aset != "") {
            $cekKategori = substr($request->file('aset')->getMimeType(), 0, 5);
            if ($cekKategori == "image")
                $kategori = "Foto";
            else if ($cekKategori == "video")
                $kategori = "Video";

            File::delete(public_path('aset/' . $data_galeri->sumber));
            $nama_aset = $request->aset->getClientOriginalName() . '-' . time() . '.' . $request->aset->extension();
            $request->aset->move(public_path('aset'), $nama_aset);
        } else {
            $nama_aset = $data_galeri->sumber;
        }

        $data_galeri->update([
            "sumber" => $nama_aset,
            "kategori" => $request->input('aset') ? $kategori : $data_galeri->kategori,
            "judul" => $request->input('judul'),
        ]);
        return redirect(url('admin/galeri'));
    }
    function hapus_galeri($id)
    {
        $data_galeri = Gallery::find($id);
        File::delete(public_path('aset/' . $data_galeri->sumber));
        $data_galeri->delete();
        return redirect(url('admin/galeri'));
    }
    function adm_kematian(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_kematian = Kematian::orderBy('kematians.created_at', 'desc')->get();
            return view('admin/kematian', compact('data_admin', 'data_kematian'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function tambah_kematian(Request $request)
    {
        Kematian::create([
            "nama" => $request->input('nama'),
            "nama_ayah" => $request->input('ayah'),
            "alamat" => $request->input('alamat'),
            "tanggal_lahir" => $request->input('lahir'),
            "tanggal_meninggal" => $request->input('meninggal'),
        ]);
        return redirect(url('admin/kematian'));
    }
    function hapus_kematian($id)
    {
        $data_kematian = Kematian::find($id);
        $data_kematian->delete();
        return redirect(url('admin/kematian'));
    }
    function edit_kematian(Request $request, $id)
    {
        $data_kematian = Kematian::find($id);
        if ($data_kematian) {
            $data_kematian->update([
                "nama" => $request->input('nama'),
                "nama_ayah" => $request->input('ayah'),
                "alamat" => $request->input('alamat'),
                "tanggal_lahir" => $request->input('lahir'),
                "tanggal_meninggal" => $request->input('meninggal'),
            ]);
        }
        return redirect(url('admin/kematian'));
    }
    function rt(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_rw = KetuaRw::orderBy('rw', 'asc')->get();
            $data_rt = KetuaRT::join('ketua_rw', 'ketua_rw.id', '=', 'ketua_r_t_s.id_rw')
                ->select('ketua_rw.*', 'ketua_r_t_s.*')
                ->orderBy('ketua_rw.rw', 'asc')
                ->orderBy('ketua_r_t_s.rt', 'asc')
                ->get();
            return view('admin/rt', compact('data_admin', 'data_rt', 'data_rw'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function tambah_rt(Request $request)
    {
        KetuaRT::create([
            "rt" => $request->input('rt'),
            "id_rw" => $request->input('rw'),
            "nama_rt" => $request->input('nama'),
            "no_hp" => $request->input('no_hp'),
            "alamat_rt" => $request->input('alamat'),
        ]);
        return redirect(url('admin/rt'));
    }
    function edit_rt(Request $request, $id)
    {
        $data_rt = KetuaRT::find($id);
        if ($data_rt) {
            $data_rt->update([
                "rt" => $request->input('rt'),
                "id_rw" => $request->input('rw'),
                "nama_rt" => $request->input('nama'),
                "no_hp" => $request->input('no_hp'),
                "alamat_rt" => $request->input('alamat'),
            ]);
        }
        return redirect(url('admin/rt'));
    }
    function hapus_rt($id)
    {
        $data_rt = KetuaRT::find($id);
        $data_rt->delete();
        return redirect(url('admin/rt'));
    }
    function adm_penduduk(Request $request)
    {
        if ($request->session()->has('id')) {
            $data_admin = User::find($request->session()->get('id'));
            $data_rw = KetuaRw::orderBy('rw', 'asc')->get();
            $data_rt = KetuaRT::orderBy('rt', 'asc')->get();
            $data_penduduk = Penduduk::join('ketua_rw', 'ketua_rw.id', '=', 'penduduks.id_rw')
                ->join('ketua_r_t_s', 'ketua_r_t_s.id', '=', 'penduduks.id_rt')
                ->select('ketua_rw.*', 'ketua_r_t_s.*', 'penduduks.*')
                ->orderBy('ketua_rw.rw', 'asc')
                ->orderBy('ketua_r_t_s.rt', 'asc')
                ->get();
            return view('admin/penduduk', compact('data_admin', 'data_rt', 'data_rw', 'data_penduduk'));
        } else {
            Session::flash('gagal', 'Login duls.');
            return redirect(url('log-in'));
        }
    }
    function getRT($id)
    {
        $rt = KetuaRT::where('id_rw', $id)->orderBy('ketua_r_t_s.rt', 'asc')->pluck('rt', 'id');
        return response()->json($rt);
    }
    function tambah_penduduk(Request $request)
    {
        Penduduk::create([
            "id_rt" => $request->input('rt'),
            "id_rw" => $request->input('rw'),
            "jumlah_penduduk" => $request->input('jumlah_penduduk'),
        ]);
        return redirect(url('admin/penduduk'));
    }
    function hapus_penduduk($id)
    {
        $data_penduduk = Penduduk::find($id);
        $data_penduduk->delete();
        return redirect(url('admin/penduduk'));
    }
    function edit_penduduk(Request $request, $id)
    {
        $data_penduduk = Penduduk::find($id);
        if ($data_penduduk) {
            $data_penduduk->update([
                "id_rt" => $request->input('rt'),
                "id_rw" => $request->input('rw'),
                "jumlah_penduduk" => $request->input('jumlah_penduduk'),
            ]);
        }
        return redirect(url('admin/penduduk'));
    }
}
