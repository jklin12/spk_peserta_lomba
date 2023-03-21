<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerangkinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::leftJoin('anggotas', 'alternatives.id_anggota', '=', 'anggotas.id_anggota')
            ->leftJoin('kriterias', 'alternatives.id_kriteria', '=', 'kriterias.id_kriteria')
            ->get();
        $kriterias = Kriteria::get();


        $susunAlternatives = [];
        $whereNotIn = [];
        foreach ($alternatives as $key => $value) {
            $whereNotIn[] = $value['id_anggota'];
            $susunAlternatives[$value['id_anggota']]['id_anggota'] = $value['id_anggota'];
            $susunAlternatives[$value['id_anggota']]['nim'] = $value['nim'];
            $susunAlternatives[$value['id_anggota']]['nama_lengkap'] = $value['nama_lengkap'];
            $susunAlternatives[$value['id_anggota']]['nilai_bobot'][$value['id_kriteria']] = (($value['nilai'] / 5) * $value->bobot_kriteria) / 100;
            $susunAlternatives[$value['id_anggota']]['bobot'][$value['id_kriteria']] = $value->bobot_kriteria;
            $susunAlternatives[$value['id_anggota']]['nilai'][$value['id_kriteria']] = $value['nilai'] / 5;
        }

        foreach ($susunAlternatives as $key => $value) {
            $susunAlternatives[$key] = $value;
            $susunAlternatives[$key]['nilai_total'] = array_sum($value['nilai_bobot']);
        }

        usort($susunAlternatives, function ($item1, $item2) {
            return $item2['nilai_total'] <=> $item1['nilai_total'];
        });


        return view('pages.perangkingan.index')->with(compact('susunAlternatives', 'kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
