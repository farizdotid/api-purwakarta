<?php

namespace App\Http\Controllers;

use App\Komunitas; //File Model
use Illuminate\Http\Request;

class KomunitasController extends Controller
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

    public function showAll(Request $request)
    {
        $kategori = $request->get('kategori');
        $data = Komunitas::where('kategori', 'like', '%'.$kategori .'%')->get();
        $response = [
            'komunitas' => [],
        ];
        foreach ($data as $key => $komunitas) {
            $response['komunitas'][$key] = [
                'id' => $komunitas->id,
                'nama' => $komunitas->nama,
                'logo_url' => $komunitas->logo,
                'kategori' => $komunitas->kategori,
                'deskripsi' => $komunitas->deskripsi
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = Komunitas::find($id);
        $response = [
            'id' => $data->id,
            'nama' => $data->nama,
            'logo_url' => $data->logo,
            'kategori' => $data->kategori,
            'deskripsi' => $data->deskripsi,
            'jadwal' => $data->jadwal,
            'kontak' => $data->kontak,
            'instagram' => $data->instagram,
            'facebook' => $data->facebook,
        ];
        return response($response, 200);
    }

    public function showKategori()
    {
        $data = Komunitas::select('kategori')->groupBy('kategori')->get();
        $response = [
            'kategori' => [],
        ];
        foreach ($data as $key => $komunitas) {
            $response['kategori'][$key] = [
                'nama' => $komunitas->kategori
            ];
        }
        return response($response, 200);
    }

}