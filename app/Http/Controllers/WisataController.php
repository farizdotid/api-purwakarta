<?php

namespace App\Http\Controllers;

use App\Wisata; //File Model
use Illuminate\Http\Request;

class WisataController extends Controller
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
        $data = Wisata::all();
        $response = [
            'wisata' => [],
        ];
        foreach ($data as $key => $wisata) {
            $response['wisata'][$key] = [
                'id' => $wisata->id,
                'nama' => $wisata->nama_tempat,
                'gambar_url' => $wisata->gambar,
                'kategori' => $wisata->kategori
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = Wisata::find($id);
        $response = [
            'id' => $data->id,
            'nama' => $data->nama_tempat,
            'gambar_url' => $data->gambar,
            'kategori' => $data->kategori,
            'deskripsi' => $data->desc_tempat,
            'photo_by' => $data->photo_by,
            'latitude' => $data->latitude,
            'longitude' => $data->longitude,
        ];
        return response($response, 200);
    }
}
