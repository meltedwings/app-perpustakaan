<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'          => 'required|string|max:255',
            'nim'           => 'required|string|max:50|unique:members,nim',
            'email'         => 'required|email|max:255|unique:members,email',
            'nomor_telepon' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'status'        => 'required|in:aktif,nonaktif',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'          => 'Nama anggota wajib diisi!',
            'nim.required'           => 'NIM tidak boleh kosong.',
            'nim.unique'             => 'NIM ini sudah terdaftar di sistem.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format alamat email tidak valid.',
            'email.unique'           => 'Email ini sudah digunakan oleh anggota lain.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required'        => 'Alamat lengkap wajib diisi.',
            'status.required'        => 'Silakan pilih status anggota.',
            'status.in'              => 'Pilihan status tidak valid.',
        ];
    }
}