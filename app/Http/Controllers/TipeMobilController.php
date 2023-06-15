<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeMobil;

class TipeMobilController extends Controller
{
    //nampilin data
    function index()
    {
        $tipeMobilData = TipeMobil::get();
        return view('pages.tipe_mobil.index', compact('tipeMobilData'));
    }

    //tambahin data
    function create()
    {
        return view('pages.tipe_mobil.create');
    }

    function store(Request $request)
    {
        //falidasi data yang mau disimpan
        $tipeMobilData = $request->validate([
            'tipe' => 'required'
        ]);

        //proses simpan data
        TipeMobil::create($tipeMobilData);

        //mengalihkan kehalaman index tipemobil
        return redirect()->to('/tipemobil');
    }

    //mengubah data
    function edit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipe_mobil.edit', compact('tipeMobilData'));
    }

    function update($id, Request $request)
    {
        //validasi data
        $validasiTipeMobil = $request->validate([
            'tipe' => 'required'
        ]);

        //cari data berdasrakan id kemudian lakukan update
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->update($validasiTipeMobil);

        //balik ke halakman sebelumnya
        return redirect()->to('/tipemobil');
    }

    //menghapus data
    function delete($id)
    {
        //ambil dta berdsasarkan id
        //lakukan delete data
        //balik ke halaman sebelumnya
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->delete();
        return redirect()->to('/tipemobil');
    }
}
