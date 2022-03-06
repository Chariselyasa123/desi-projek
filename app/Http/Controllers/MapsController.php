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
            'maps' => Map::all()->map(function ($map) {
                return [
                    'id'               => $map->id,
                    'nama_gunung'      => $map->nama_gunung,
                    'status_gunung'    => $map->status_gunung,
                    'jenis_gunung'     => $map->jenis_gunung,
                    'tinggi'           => $map->tinggi,
                    'luas'             => $map->luas,
                    'status_pendakian' => $map->status_pendakian,
                    'cuaca'            => $map->cuaca,
                    'biaya_simaksi'    => $map->biaya_simaksi,
                    'human_date'       => $map->updated_at->diffForHumans(),
                    'date'             => $map->updated_at->format('d M Y'),
                    'diff_date'        => $map->updated_at->diffInDays()
                ];
            }),
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
            'tinggi'                   => 'required|numeric',
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
            'long'                     => 'required',
            'lat'                      => 'required',
        ]);

        Map::create($request->all());

        return redirect()->route('data-maps')->with('message', 'Map created successfully.');
    }

    public function show(Map $map)
    {
        return view('sebaran-gunung', [
            'maps' => $map->all()->toArray(),
        ]);
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
            'long'                     => 'required',
            'lat'                      => 'required',
        ]);

        $map->update($request->all());

        return redirect()->route('data-maps')->with('message', 'Map updated successfully.');
    }

    public function destroy(Map $map)
    {
        $map->delete();

        return redirect()->route('data-maps')->with('message', 'Map deleted successfully.');
    }

    public function single(Map $map)
    {
        $dataGunung = $map->first();

        return Inertia::render('Gunung', [
            'map'        => $dataGunung,
            'human_date' => $dataGunung->updated_at->diffForHumans(),
            'date'       => $dataGunung->updated_at->format('d M Y'),
            'diff_date'  => $dataGunung->updated_at->diffInDays(),
        ]);
    }

    public function getAllMountains()
    {
        return response()->json(['message' => 'success', 'data' => Map::all('id', 'nama_gunung')]);
    }

    public function updateMountainData(Request $request)
    {
        $map = Map::whereId($request->id)->update([
            'status_gunung'    => $request->status_gunung,
            'status_pendakian' => $request->status_pendakian,
            'cuaca'            => $request->cuaca,
        ]);

        return response()->json(['message' => 'success', 'data' => $map]);
    }
}
