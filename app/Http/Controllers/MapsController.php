<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MapsController extends Controller
{
    public function index()
    {
        return Inertia::render('Maps/Maps', [
            'maps' => Map::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Maps/CreateMapsData');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gunung'              => 'required|string|max:255',
            'tinggi'                   => 'required|integer',
            'luas'                     => 'required|numeric',
            'jenis_gunung'             => 'required|string|max:255',
            'status_gunung'            => 'required|string|max:255',
            'status_pendakian'         => 'required|string|max:255',
            'cuaca'                    => 'required|string|max:255',
            'kuota_pendakian_hari_ini' => 'required|string|max:255',
            'jalur_pendakian'          => 'required|string|max:255',
            'persyaratan_pendakian'    => 'required|string',
            'peraturan_wilayah_gunung' => 'required|string',
            'biaya_simaksi'            => 'required|integer',
            'data_kecelakaan_gunung'   => 'required|string',
            'contact_us'               => 'required|string|max:255',
            'coordinates'              => 'required|string',
        ]);

        Map::create($request->all());

        return redirect()->route('data-maps')->with('message', 'Map created successfully.');
    }

    public function show(Map $map)
    {
        //
    }

    public function edit(Map $map)
    {
        return Inertia::render('Maps/EditMapsData', [
            'map' => $map->first(),
        ]);
    }

    public function update(Request $request, Map $map)
    {
        $request->validate([
            'nama_gunung'              => 'required',
            'tinggi'                   => 'required',
            'luas'                     => 'required',
            'jenis_gunung'             => 'required',
            'status_gunung'            => 'required',
            'status_pendakian'         => 'required',
            'cuaca'                    => 'required',
            'kuota_pendakian_hari_ini' => 'required',
            'jalur_pendakian'          => 'required',
            'persyaratan_pendakian'    => 'required',
            'peraturan_wilayah_gunung' => 'required',
            'biaya_simaksi'            => 'required',
            'data_kecelakaan_gunung'   => 'required',
            'contact_us'               => 'required',
            'coordinates'              => 'required',
        ]);


        $map->update($request->all());

        return redirect()->route('data-maps')->with('message', 'Map updated successfully.');
    }

    public function destroy(Map $map)
    {
        $map->delete();

        return redirect()->route('data-maps')->with('message', 'Map deleted successfully.');
    }
}