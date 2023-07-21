<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekomendasis = Rekomendasi::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.rekomendasi', compact(['rekomendasis']));
    }
    public function index_verifikator()
    {
        $rekomendasis = Rekomendasi::orderBy('id', 'desc')->get();
        return view('verifikator.rekomendasi', compact(['rekomendasis']));
    }

    public function setuju($id)
    {
        Rekomendasi::where('id', $id)->update([
            'status' => 'diterima'
        ]);
        return redirect('/rekomendasi_verifikator');
    }
    public function ditolak(Request $request, $id)
    {
        Rekomendasi::where('id', $id)->update([
            'status' => 'ditolak',
            'alasan' => $request->alasan
        ]);
        return redirect('/rekomendasi_verifikator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.rekomendasi-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pemohon' => 'required',
            'nip_pemohon' => 'required',
            'nama_perangkat_daerah' => 'required',
            'jabatan_pemohon' => 'required',
            'no_telp_pemohon' => 'required',
            'email_pemohon' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'alasan' => 'required',
        ]);

        Rekomendasi::create($validated);

        return redirect('/rekomendasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekomendasi = Rekomendasi::where('id', $id)->get()->last();
        return view('user.rekomendasi-edit', compact(['rekomendasi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pemohon' => 'required',
            'nip_pemohon' => 'required',
            'nama_perangkat_daerah' => 'required',
            'jabatan_pemohon' => 'required',
            'no_telp_pemohon' => 'required',
            'email_pemohon' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'alasan' => 'required',
        ]);

        Rekomendasi::where('id', $id)->update($validated);

        return redirect('/rekomendasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rekomendasi::where('id', $id)->delete();

        return redirect('/rekomendasi');
    }
}
