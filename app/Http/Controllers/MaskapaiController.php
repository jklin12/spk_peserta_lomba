<?php

namespace App\Http\Controllers;

use App\Models\Maskapai;
use Illuminate\Http\Request;

class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maskapais = Maskapai::get();


        return view('pages.maskapai.index')->with(compact('maskapais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maskapai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_maskapai' => 'required', 
        ]);

        $postVal  = [
            'nama_maskapai' => $request->nama_maskapai, 
        ];

        Maskapai::create($postVal);

        return redirect(route('maskapai.index'))->withSuccess('Tambah Maskapai Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maskapai  $maskapai
     * @return \Illuminate\Http\Response
     */
    public function show(Maskapai $maskapai)
    {
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maskapai  $maskapai
     * @return \Illuminate\Http\Response
     */
    public function edit(Maskapai $maskapai)
    {
        return view('pages.maskapai.edit')->with(compact('maskapai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maskapai  $maskapai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maskapai $maskapai)
    {
        $this->validate($request, [
            'nama_maskapai' => 'required'
        ]);

        $postVal  = [
            'nama_maskapai' => $request->nama_maskapai, 
        ];

        $maskapai->update($postVal);

        return redirect(route('maskapai.index'))->withSuccess('Edit Maskapai Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maskapai  $maskapai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maskapai $maskapai)
    {
        $maskapai->delete();

        return redirect(route('maskapai.index'))->withSuccess('Hapus Maskapai Berhasil');
    }
}
