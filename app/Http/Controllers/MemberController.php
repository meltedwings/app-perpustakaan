<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // Menambahkan fitur pencarian & pagination
        $members = Member::when($request->search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })->paginate(10);

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        Member::create($request->validated());

        return redirect()->route('members.index')
                         ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $member = Member::findOrFail($id);

        // Validasi inline untuk mengecualikan (ignore) NIM dan Email member ini sendiri
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'nim'           => 'required|string|max:50|unique:members,nim,' . $member->id,
            'email'         => 'required|email|max:255|unique:members,email,' . $member->id,
            'nomor_telepon' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'status'        => 'required|in:aktif,nonaktif',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
                         ->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')
                         ->with('success', 'Anggota berhasil dihapus.');
    }
}