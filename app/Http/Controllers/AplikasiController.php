<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplikasis = Aplikasi::where("user_id", Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.aplikasi', compact(['aplikasis']));
    }
    public function index_verifikator()
    {
        $aplikasis = Aplikasi::orderBy('id', 'desc')->get();
        return view('verifikator.aplikasi', compact(['aplikasis']));
    }
    public function setuju($id)
    {
        Aplikasi::where('id', $id)->update([
            'status' => 'diterima'
        ]);
        return redirect('/aplikasi_verifikator');
    }
    public function ditolak(Request $request, $id)
    {
        Aplikasi::where('id', $id)->update([
            'status' => 'ditolak',
            'alasan' => $request->alasan,
        ]);
        return redirect('/aplikasi_verifikator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.aplikasi-create');
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
            'nama' => 'required',
            'nip' => 'required',
            'nama_dinas' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        // Lakukan tindakan jika validasi berhasil
        $product_image = $request->file('file');
        $gambar = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $gambar);

        // dd(Auth::user()->id);
        $user_id = Auth::user()->id;
        Aplikasi::create([
            'user_id' => $user_id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nama_dinas' => $request->nama_dinas,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'file' => $gambar,
            'status' => 'menunggu',
            'alasan' => 'null',
        ]);

        return redirect('/aplikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aplikasi = Aplikasi::where('id', $id)->get()->last();
        return view('user.aplikasi-edit', compact(['aplikasi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nama_dinas' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'file' => 'nullable|mimes:pdf'
        ]);

        // dd(Auth::user()->id);
        $user_id = Auth::user()->id;
       $aplikasi = Aplikasi::where('id', $id)->first();

       $aplikasi->update([
            'user_id' => $user_id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nama_dinas' => $request->nama_dinas,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'status' => 'menunggu',
            'alasan' => 'null',
        ]);
    

       if ($request->has('file')) {
            // Lakukan tindakan jika validasi berhasil
            $product_image = $request->file('file');
            $gambar = $product_image->getClientOriginalName();
            $tujuan_upload = './assets/image';
            $product_image->move($tujuan_upload, $gambar);
            
            $aplikasi->update([
                'file' => $gambar,
            ]);
       }
    
    
        return redirect('/aplikasi');
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mo  dels\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aplikasi::where('id', $id)->delete();
        return redirect('/aplikasi');
    }
}
