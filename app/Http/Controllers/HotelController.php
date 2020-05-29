<?php

namespace App\Http\Controllers;

use App\Hotel; //File Model
use Illuminate\Http\Request;

class HotelController extends Controller
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
        $data = Hotel::all();
        $response = [
            'hotel' => [],
        ];
        foreach ($data as $key => $hotel) {
            $response['hotel'][$key] = [
                'id' => $hotel->id,
                'nama' => $hotel->nama,
                'alamat' => $hotel->alamat,
                'nomor_telp' => $hotel->nomortelp,
                'kordinat' => $hotel->kordinat,
                'gambar_url' => $hotel->gambar
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = Hotel::find($id);
        $response = [
            'id' => $data->id,
            'nama' => $data->nama,
            'alamat' => $data->alamat,
            'website' => $data->website,
            'nomor_telp' => $data->nomortelp,
            'kordinat' => $data->kordinat,
            'gambar_url' => $data->gambar
        ];
        return response($response, 200);
    }
}
