<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MembersController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('PendaftaranAnggota', [
            'fakultas' => Faculty::all(),
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
            'semester'     => $request->semester,
            'tempat_lahir' => $request->tempat,
            'birthday'     => $request->birthday,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'email'        => $request->email,
        ]);

        return redirect()->route('pendaftaran-anggota')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Member $member)
    {
        //
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
        //
    }
}
