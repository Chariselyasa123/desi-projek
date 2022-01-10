<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutUsController extends Controller
{
    public function index()
    {
        return Inertia::render('Struktur/Struktur', [
            'struktur' => AboutUs::orderBy('periode_menjabat', 'desc')->first(),
            'periode'  => AboutUs::all()->pluck('periode_menjabat'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Struktur/CreateStruktur');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ketua_umum'       => 'required|string',
            'sekertaris'       => 'required|string',
            'bendahara'        => 'required|string',
            'kepala_bidang_1'  => 'required|string',
            'kepala_bidang_2'  => 'required|string',
            'kepala_bidang_3'  => 'required|string',
            'kepala_bidang_4'  => 'required|string',
            'kepala_bidang_5'  => 'required|string',
            'kepala_divisi_1'  => 'required|string',
            'kepala_divisi_2'  => 'required|string',
            'periode_menjabat' => 'required|string|regex:/^[0-9]{4}-[0-9]{4}$/',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('struktur-organisasi')->with('message', 'Data berhasil ditambahkan');
    }

    public function show(AboutUs $aboutUs)
    {
        //
    }

    public function edit(AboutUs $aboutUs)
    {
        //
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        //
    }

    public function destroy(AboutUs $aboutUs)
    {
        //
    }

    public function getData($periode_menjabat)
    {
        return AboutUs::where('periode_menjabat', $periode_menjabat)->first();
    }
}
