<?php

namespace App\Http\Controllers;

use App\TempatIbadah; //File Model
use Illuminate\Http\Request;

class TempatIbadahController extends Controller
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
        $jenis = $request->get('jenis');
        $data = TempatIbadah::where('jenis', 'like', '%'.$jenis .'%')->get();
        // $data = TempatIbadah::all();
        $response = [
            'tempat_ibadah' => [],
        ];
        foreach ($data as $key => $ibadah) {
            $response['tempat_ibadah'][$key] = [
                'id' => $ibadah->id,
                'nama' => $ibadah->nama,
                'jenis' => $ibadah->jenis,
                'latitude' => $ibadah->latitude,
                'longitude' => $ibadah->longitude
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = TempatIbadah::find($id);
        $response = [
            'id' => $data->id,
            'nama' => $data->nama,
            'jenis' => $data->jenis,
            'latitude' => $data->latitude,
            'longitude' => $data->longitude
        ];
        return response($response, 200);
    }
}
