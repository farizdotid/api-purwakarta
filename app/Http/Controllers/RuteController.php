<?php

namespace App\Http\Controllers;

use App\Rute; //File Model
use Illuminate\Http\Request;

class RuteController extends Controller
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
        $data = Rute::all();
        $response = [
            'rute_angkot' => [],
        ];
        foreach ($data as $key => $rute) {
            $response['rute_angkot'][$key] = [
                'id' => $rute->id,
                'trayek' => $rute->trayek,
                'nomor_angkot' => $rute->kode_mobil,
                'lintasan' => $rute->lintasan,
                'gambar_url' => $rute->gambar
            ];
        }
        return response($response, 200);
    }

    public function detail($id)
    {
        $data = Rute::find($id);
        $response = [
            'id' => $data->id,
            'trayek' => $data->trayek,
            'nomor_angkot' => $data->kode_mobil,
            'lintasan' => $data->lintasan,
            'gambar_url' => $data->gambar
        ];
        return response($response, 200);
    }
}
