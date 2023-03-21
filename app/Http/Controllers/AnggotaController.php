<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = Anggota::get();


        return view('pages.anggota.index')->with(compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.anggota.create');
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
            'nim' => 'required|integer',
            'nama_lengkap' => 'required',
            /*'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'no_telepon' => 'required',*/
        ]);

        $postVal  = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'no_telepon' => $request->no_telepon,
        ];

        Anggota::create($postVal);

        return redirect(route('anggota.index'))->withSuccess('Tambah Anggota Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id)->first();
        return view('pages.anggota.edit')->with(compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idAnggota)
    {
        $this->validate($request, [
            'nim' => 'required|integer',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'no_telepon' => 'required',
        ]);

        $postVal  = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'no_telepon' => $request->no_telepon,
        ];

        Anggota::find($idAnggota)->update($postVal);

        return redirect(route('anggota.index'))->withSuccess('Edit Anggota Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAnggota)
    {
        Anggota::find($idAnggota)->delete();

        return redirect(route('anggota.index'))->withSuccess('Hapus Anggota Berhasil');
    }
}
