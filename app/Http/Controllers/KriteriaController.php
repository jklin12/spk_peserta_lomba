<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = Kriteria::get();

        $jumlah = 0;
        foreach ($kriterias as $key => $value) {
            $jumlah += $value->bobot_kriteria;
        }


        return view('pages.kriteria.index')->with(compact('kriterias','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kriteria.create');
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
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required', 
        ]);

        $postVal  = [
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
        
        ];

        Kriteria::create($postVal);

        return redirect(route('kriteria.index'))->withSuccess('Tambah Kriteria Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('pages.kriteria.edit')->with(compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required', 
        ]);

        $postVal  = [
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
        
        ];

        Kriteria::find($id)->update($postVal);

        return redirect(route('kriteria.index'))->withSuccess('Update Kriteria Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::find($id)->delete();

        return redirect(route('kriteria.index'))->withSuccess('Hapus Kriteria Berhasil');
    }
}
