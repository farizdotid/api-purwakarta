<?php

namespace App\Http\Controllers;

use App\Pengumuman; //File Model
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAll()
    {
        $data = Pengumuman::all();
        $response = [
            'pengumuman' => [],
        ];
        foreach ($data as $key => $pengumuman) {
            $response['pengumuman'][$key] = [
                'id' => $pengumuman->id,
                'gambar_url' => $pengumuman->gambar,
                'nama' => $pengumuman->nama,
                'tanggal' => $pengumuman->tanggal
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = Pengumuman::find($id);
        $response = [
            'id' => $data->id,
            'gambar_url' => $data->gambar,
            'nama' => $data->nama,
            'tanggal' => $data->tanggal,
            'deskripsi' => $data->deskripsi,
            'sumber' => $data->sumber,

        ];
        return response($response, 200);
    }
}
