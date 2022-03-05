<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\AboutUs;
use Facade\Ignition\Http\Middleware\IgnitionEnabled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class AboutUsController extends Controller
{
    public function index()
    {
        return Inertia::render('Struktur/Struktur', [
            'struktur' => AboutUs::orderBy('periode_menjabat', 'desc')->first(),
            'periode'  => AboutUs::all()->map(function ($data) {
                return [
                    'id'      => $data->id,
                    'periode' => $data->periode_menjabat
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Struktur/CreateStruktur');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ketua_umum'             => 'required|string',
            'sekertaris'             => 'required|string',
            'bendahara'              => 'required|string',
            'kepala_bidang_1'        => 'required|string',
            'kepala_bidang_2'        => 'required|string',
            'kepala_bidang_3'        => 'required|string',
            'kepala_bidang_4'        => 'required|string',
            'kepala_bidang_5'        => 'required|string',
            'kepala_divisi_1'        => 'required|string',
            'kepala_divisi_2'        => 'required|string',
            'periode_menjabat'       => 'required|string|regex:/^[0-9]{4}-[0-9]{4}$/',
            'gambar_ketua_umum'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_sekertaris'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_bendahara'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_bidang_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_bidang_2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_bidang_3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_bidang_4' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_bidang_5' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_divisi_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kepala_divisi_2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $gambarKetuaUmum     = time().$request->gambar_ketua_umum->getClientOriginalName().'.'.$request->gambar_ketua_umum->extension();
        $gambarSekertaris    = time().$request->gambar_sekertaris->getClientOriginalName().'.'.$request->gambar_sekertaris->extension();
        $gambarBendahara     = time().$request->gambar_bendahara->getClientOriginalName().'.'.$request->gambar_bendahara->extension();
        $gambarKepalaBidang1 = time().$request->gambar_kepala_bidang_1->getClientOriginalName().'.'.$request->gambar_kepala_bidang_1->extension();
        $gambarKepalaBidang2 = time().$request->gambar_kepala_bidang_2->getClientOriginalName().'.'.$request->gambar_kepala_bidang_2->extension();
        $gambarKepalaBidang3 = time().$request->gambar_kepala_bidang_3->getClientOriginalName().'.'.$request->gambar_kepala_bidang_3->extension();
        $gambarKepalaBidang4 = time().$request->gambar_kepala_bidang_4->getClientOriginalName().'.'.$request->gambar_kepala_bidang_4->extension();
        $gambarKepalaBidang5 = time().$request->gambar_kepala_bidang_5->getClientOriginalName().'.'.$request->gambar_kepala_bidang_5->extension();
        $gambarKepalaDivisi1 = time().$request->gambar_kepala_divisi_1->getClientOriginalName().'.'.$request->gambar_kepala_divisi_1->extension();
        $gambarKepalaDivisi2 = time().$request->gambar_kepala_divisi_2->getClientOriginalName().'.'.$request->gambar_kepala_divisi_2->extension();

        $request->gambar_ketua_umum->move(public_path('images'), $gambarKetuaUmum);
        $request->gambar_sekertaris->move(public_path('images'), $gambarSekertaris);
        $request->gambar_bendahara->move(public_path('images'), $gambarBendahara);
        $request->gambar_kepala_bidang_1->move(public_path('images'), $gambarKepalaBidang1);
        $request->gambar_kepala_bidang_2->move(public_path('images'), $gambarKepalaBidang2);
        $request->gambar_kepala_bidang_3->move(public_path('images'), $gambarKepalaBidang3);
        $request->gambar_kepala_bidang_4->move(public_path('images'), $gambarKepalaBidang4);
        $request->gambar_kepala_bidang_5->move(public_path('images'), $gambarKepalaBidang5);
        $request->gambar_kepala_divisi_1->move(public_path('images'), $gambarKepalaDivisi1);
        $request->gambar_kepala_divisi_2->move(public_path('images'), $gambarKepalaDivisi2);

        AboutUs::create([
            'ketua_umum'             => $request->ketua_umum,
            'sekertaris'             => $request->sekertaris,
            'bendahara'              => $request->bendahara,
            'kepala_bidang_1'        => $request->kepala_bidang_1,
            'kepala_bidang_2'        => $request->kepala_bidang_2,
            'kepala_bidang_3'        => $request->kepala_bidang_3,
            'kepala_bidang_4'        => $request->kepala_bidang_4,
            'kepala_bidang_5'        => $request->kepala_bidang_5,
            'kepala_divisi_1'        => $request->kepala_divisi_1,
            'kepala_divisi_2'        => $request->kepala_divisi_2,
            'periode_menjabat'       => $request->periode_menjabat,
            'gambar_ketua_umum'      => $gambarKetuaUmum,
            'gambar_sekertaris'      => $gambarSekertaris,
            'gambar_bendahara'       => $gambarBendahara,
            'gambar_kepala_bidang_1' => $gambarKepalaBidang1,
            'gambar_kepala_bidang_2' => $gambarKepalaBidang2,
            'gambar_kepala_bidang_3' => $gambarKepalaBidang3,
            'gambar_kepala_bidang_4' => $gambarKepalaBidang4,
            'gambar_kepala_bidang_5' => $gambarKepalaBidang5,
            'gambar_kepala_divisi_1' => $gambarKepalaDivisi1,
            'gambar_kepala_divisi_2' => $gambarKepalaDivisi2,
        ]);

        return redirect()->route('struktur-organisasi')->with('message', 'Data berhasil ditambahkan');
    }

    public function show(AboutUs $aboutUs)
    {
        return Inertia::render('TentangKami');
    }

    public function struktur(AboutUs $aboutUs)
    {
        return Inertia::render('StrukturOrganisasi', [
            'strukturOrganisasi' => $aboutUs->latest()->first(),
            'periode'            => $aboutUs->all()->map(function ($data) {
                return $data->periode_menjabat;
            })
        ]);
    }

    public function getData($id)
    {
        return AboutUs::whereId($id)->first();
    }

    public function contactUs()
    {
        return Inertia::render('ContactUs');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('ripala.tng@gmail.com')->send(new ContactUs($request->message));

        return redirect()->route('contact-us')->with('message', 'Pesan berhasil dikirim');
    }

    public function edit(AboutUs $aboutUs)
    {
        return Inertia::render('Struktur/EditStruktur', [
            'struktur' => $aboutUs
        ]);
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        $request->validate([
            'ketua_umum'      => 'required|string',
            'sekertaris'      => 'required|string',
            'bendahara'       => 'required|string',
            'kepala_bidang_1' => 'required|string',
            'kepala_bidang_2' => 'required|string',
            'kepala_bidang_3' => 'required|string',
            'kepala_bidang_4' => 'required|string',
            'kepala_bidang_5' => 'required|string',
            'kepala_divisi_1' => 'required|string',
            'kepala_divisi_2' => 'required|string',
        ]);

        $gambarKetuaUmum     = is_string($request->gambar_ketua_umum) ? $request->gambar_ketua_umum : time().$request->gambar_ketua_umum->getClientOriginalName().'.'.$request->gambar_ketua_umum->extension();
        $gambarSekertaris    = is_string($request->gambar_sekertaris) ? $request->gambar_sekertaris : time().$request->gambar_sekertaris->getClientOriginalName().'.'.$request->gambar_sekertaris->extension();
        $gambarBendahara     = is_string($request->gambar_bendahara) ? $request->gambar_bendahara : time().$request->gambar_bendahara->getClientOriginalName().'.'.$request->gambar_bendahara->extension();
        $gambarKepalaBidang1 = is_string($request->gambar_kepala_bidang_1) ? $request->gambar_kepala_bidang_1 : time().$request->gambar_kepala_bidang_1->getClientOriginalName().'.'.$request->gambar_kepala_bidang_1->extension();
        $gambarKepalaBidang2 = is_string($request->gambar_kepala_bidang_2) ? $request->gambar_kepala_bidang_2 : time().$request->gambar_kepala_bidang_2->getClientOriginalName().'.'.$request->gambar_kepala_bidang_2->extension();
        $gambarKepalaBidang3 = is_string($request->gambar_kepala_bidang_3) ? $request->gambar_kepala_bidang_3 : time().$request->gambar_kepala_bidang_3->getClientOriginalName().'.'.$request->gambar_kepala_bidang_3->extension();
        $gambarKepalaBidang4 = is_string($request->gambar_kepala_bidang_4) ? $request->gambar_kepala_bidang_4 : time().$request->gambar_kepala_bidang_4->getClientOriginalName().'.'.$request->gambar_kepala_bidang_4->extension();
        $gambarKepalaBidang5 = is_string($request->gambar_kepala_bidang_5) ? $request->gambar_kepala_bidang_5 : time().$request->gambar_kepala_bidang_5->getClientOriginalName().'.'.$request->gambar_kepala_bidang_5->extension();
        $gambarKepalaDivisi1 = is_string($request->gambar_kepala_divisi_1) ? $request->gambar_kepala_divisi_1 : time().$request->gambar_kepala_divisi_1->getClientOriginalName().'.'.$request->gambar_kepala_divisi_1->extension();
        $gambarKepalaDivisi2 = is_string($request->gambar_kepala_divisi_2) ? $request->gambar_kepala_divisi_2 : time().$request->gambar_kepala_divisi_2->getClientOriginalName().'.'.$request->gambar_kepala_divisi_2->extension();

        ! is_string($request->gambar_ketua_umum) ? $request->gambar_ketua_umum->move(public_path('images'), $gambarKetuaUmum) : null;
        ! is_string($request->gambar_sekertaris) ? $request->gambar_sekertaris->move(public_path('images'), $gambarSekertaris) : null;
        ! is_string($request->gambar_bendahara) ? $request->gambar_bendahara->move(public_path('images'), $gambarBendahara) : null;
        ! is_string($request->gambar_kepala_bidang_1) ? $request->gambar_kepala_bidang_1->move(public_path('images'), $gambarKepalaBidang1) : null;
        ! is_string($request->gambar_kepala_bidang_2) ? $request->gambar_kepala_bidang_2->move(public_path('images'), $gambarKepalaBidang2) : null;
        ! is_string($request->gambar_kepala_bidang_3) ? $request->gambar_kepala_bidang_3->move(public_path('images'), $gambarKepalaBidang3) : null;
        ! is_string($request->gambar_kepala_bidang_4) ? $request->gambar_kepala_bidang_4->move(public_path('images'), $gambarKepalaBidang4) : null;
        ! is_string($request->gambar_kepala_bidang_5) ? $request->gambar_kepala_bidang_5->move(public_path('images'), $gambarKepalaBidang5) : null;
        ! is_string($request->gambar_kepala_divisi_1) ? $request->gambar_kepala_divisi_1->move(public_path('images'), $gambarKepalaDivisi1) : null;
        ! is_string($request->gambar_kepala_divisi_2) ? $request->gambar_kepala_divisi_2->move(public_path('images'), $gambarKepalaDivisi2) : null;

        $aboutUs->update([
            'ketua_umum'             => $request->ketua_umum,
            'sekertaris'             => $request->sekertaris,
            'bendahara'              => $request->bendahara,
            'kepala_bidang_1'        => $request->kepala_bidang_1,
            'kepala_bidang_2'        => $request->kepala_bidang_2,
            'kepala_bidang_3'        => $request->kepala_bidang_3,
            'kepala_bidang_4'        => $request->kepala_bidang_4,
            'kepala_bidang_5'        => $request->kepala_bidang_5,
            'kepala_divisi_1'        => $request->kepala_divisi_1,
            'kepala_divisi_2'        => $request->kepala_divisi_2,
            'periode_menjabat'       => $request->periode_menjabat,
            'gambar_ketua_umum'      => $gambarKetuaUmum,
            'gambar_sekertaris'      => $gambarSekertaris,
            'gambar_bendahara'       => $gambarBendahara,
            'gambar_kepala_bidang_1' => $gambarKepalaBidang1,
            'gambar_kepala_bidang_2' => $gambarKepalaBidang2,
            'gambar_kepala_bidang_3' => $gambarKepalaBidang3,
            'gambar_kepala_bidang_4' => $gambarKepalaBidang4,
            'gambar_kepala_bidang_5' => $gambarKepalaBidang5,
            'gambar_kepala_divisi_1' => $gambarKepalaDivisi1,
            'gambar_kepala_divisi_2' => $gambarKepalaDivisi2,
        ]);

        return redirect()->route('struktur-organisasi')->with('message', 'Data berhasil diupdate');
    }
}
