<?php

namespace App\Http\Controllers;

use App\Kuliner; //File Model
use Illuminate\Http\Request;

class KulinerController extends Controller
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
        $data = Kuliner::all();
        $response = [
            'kuliner' => [],
        ];
        foreach ($data as $key => $kuliner) {
            $response['kuliner'][$key] = [
                'id' => $kuliner->id,
                'nama' => $kuliner->nama,
                'alamat' => $kuliner->alamat,
                'jam_buka_tutup' => $kuliner->buka,
                'kordinat' => $kuliner->kordinat,
                'gambar_url' => $kuliner->gambar,
                'kategori' => $kuliner->kategori
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = Kuliner::find($id);
        $response = [
            'id' => $data->id,
            'nama' => $data->nama,
            'alamat' => $data->alamat,
            'jam_buka_tutup' => $data->buka,
            'kordinat' => $data->kordinat,
            'gambar_url' => $data->gambar,
            'kategori' => $data->kategori,
            'nomor_telp' => $data->nomortelp,
            'deskripsi' => $data->menyediakan,
        ];
        return response($response, 200);
    }
}
