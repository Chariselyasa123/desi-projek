<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MembersController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('PendaftaranAnggota', [
            'fakultas' => Faculty::with('programs')->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'fakultas' => 'required|numeric|exists:faculties,id|not_in:0|not_in:null',
            'jurusan'  => 'required|numeric|exists:programs,id|not_in:0|not_in:null',
            'semester' => 'required|numeric|in:1,2,3,4,5',
            'tempat'   => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'birthday' => 'required|date|before:today|after:1990-01-01',
            'address'  => 'required|string',
            'phone'    => 'required|string|max:15|regex:/^[0-9]+$/',
            'email'    => 'required|email|unique:members,email|max:50|not_in:null|not_in:0',
        ]);

        // Insert data ke database
        Member::create([
            'name'         => $request->name,
            'faculty_id'   => $request->fakultas,
            'program_id'   => $request->jurusan,
            'semester'     => $request->semester,
            'tempat_lahir' => $request->tempat,
            'birthday'     => $request->birthday,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'email'        => $request->email,
        ]);

        return redirect()->route('pendaftaran-anggota')->with('message', 'Berhasi Mendaftarkan Anggota');
    }

    public function show(Request $request)
    {
        return Inertia::render('Anggota/InformasiAnggota', [
            'members' => Member::with('faculty', 'program')->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('status', 'like', "%{$search}%")
                             ->orWhere('semester', 'like', "%{$search}%");
            })->paginate(10)->through(function ($data) {
                return [
                    'id'        => $data->id,
                    'name'      => $data->name,
                    'fakultas'  => $data->faculty->nama_fakultas,
                    'jurusan'   => $data->program->nama_prodi,
                    'jenjang'   => $data->program->jenjang,
                    'semester'  => $data->semester,
                    'tglDaftar' => $data->created_at->format('d M Y'),
                    'usia'      => Carbon::parse($data->birthday)->age,
                    'status'    => $data->status,
                ];
            }),
        ]);
    }

    public function edit(Member $member)
    {
        //
    }

    public function update(Request $request, Member $member)
    {
        //
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('anggota')->with('message', 'Anggota berhasil dihapus');
    }
}
