<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Anggota;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::leftJoin('anggotas', 'alternatives.id_anggota', '=', 'anggotas.id_anggota')->get();
        $kriterias = Kriteria::get();


        $susunAlternatives = [];
        $whereNotIn = [];
        foreach ($alternatives as $key => $value) {
            $whereNotIn[] = $value['id_anggota'];
            $susunAlternatives[$value['id_anggota']]['id_anggota'] = $value['id_anggota'];
            $susunAlternatives[$value['id_anggota']]['nim'] = $value['nim'];
            $susunAlternatives[$value['id_anggota']]['nama_lengkap'] = $value['nama_lengkap'];
            $susunAlternatives[$value['id_anggota']]['nilai'][$value['id_kriteria']] = $value['nilai'];
            $susunAlternatives[$value['id_anggota']]['nilai_bobot'][$value['id_kriteria']] = $value['nilai'] / 5;
        }

        $anggotas = Anggota::whereNotIn('id_anggota', $whereNotIn)->get();

        return view('pages.alternativ.index')->with(compact('susunAlternatives', 'kriterias', 'anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kriterias = Kriteria::get();

        $anggota = Anggota::where('id_anggota', $request->id)->first();


        return view('pages.alternativ.create')->with(compact('kriterias', 'anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postVal = [];
        foreach ($request->kriteria as $key => $value) {
            $postVal[$key]['id_anggota'] = $request->id_anggota;
            $postVal[$key]['id_kriteria'] = $key;
            $postVal[$key]['nilai'] = $value;
        }

        Alternative::insert($postVal);

        $request->session()->flash('success', 'Tambah Alternative Berhasil');
        return response()->json($postVal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternative $alternative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternative $alternative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternative $alternative)
    {
        //
    }
}
