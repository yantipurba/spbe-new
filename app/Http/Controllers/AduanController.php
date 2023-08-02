<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aduans = Aduan::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('user.aduan', compact(['aduans']));
    }
    public function index_verifikator()
    {
        $aduans = Aduan::orderBy('id', 'desc')->get();
        return view('verifikator.aduan', compact(['aduans']));
    }
    public function setuju($id)
    {
        Aduan::where('id', $id)->update([
            'status' => 'diterima'
        ]);

        return redirect('/aduan_verifikator');
    }
    public function ditolak(Request $request, $id)
    {
        Aduan::where('id', $id)->update([
            'status' => 'ditolak',
            'alasan' => $request->alasan
        ]);
        return redirect('/aduan_verifikator');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.aduan-create');
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
            'nama_perangkat_daerah' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'nama_lokasi' => 'required',
            'kondisi_lokasi' => 'required',
            'alamat' => 'required',
            'kota_atau_kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'permohonan_kecepatan_internet' => 'required',
            'file_dokumen' => 'required|mimes:pdf',
            'file_gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

          // Lakukan tindakan jika validasi berhasil
          $dokumen = $request->file('file_dokumen');
          $dokumenFileName = $dokumen->getClientOriginalName();
          $tujuan_upload = './assets/image';
          $dokumen->move($tujuan_upload, $dokumen);

           // Lakukan tindakan jika validasi berhasil
           $gambar = $request->file('file_gambar');
           $gambarFileName = $gambar->getClientOriginalName();
           $tujuan_upload = './assets/image';
           $gambar->move($tujuan_upload, $gambar);

        // dd(Auth::user()->id);
            $user_id = Auth::user()->id;
            Aduan::create([
                'user_id' => $user_id,
                'nama_perangkat_daerah' => $request->nama_perangkat_daerah,
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'nama_lokasi' => $request->nama_lokasi,
                'kondisi_lokasi' => $request->kondisi_lokasi,
                'alamat' => $request->alamat,
                'kota_atau_kabupaten' => $request->kota_atau_kabupaten,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'RT' => $request->RT,
                'RW' => $request->RW,
                'permohonan_kecepatan_internet' => $request->permohonan_kecepatan_internet,
                'file_dokumen' => $dokumenFileName,
                'file_gambar' => $gambarFileName,
                'status' => 'menunggu',
                'alasan' => 'null',
            ]);

                return redirect('/aduan');
            }
/**
* Display the specified resource.
*
* @param  \App\Models\Aduan  $aduan
* @return \Illuminate\Http\Response
*/
        public function show(Aduan $aduan)
            {
                //
            }
        
/**
* Show the form for editing the specified resource.
*
* @param  \App\Models\Aduan  $aplikasi
* @return \Illuminate\Http\Response
*/
        public function edit($id)
        {
            $aduan = Aduan::where('id', $id)->get()->last();
            return view('user.aduan-edit', compact(['aduan']));
        }

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Models\Aduan $aduan
* @return \Illuminate\Http\Response
*/
        public function update(Request $request, $id)
            {
            $validated = $request->validate([
            'nama_perangkat_daerah' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'nama_lokasi' => 'required',
            'kondisi_lokasi' => 'required',
            'alamat' => 'required',
            'kota_atau_kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'permohonan_kecepatan_internet' => 'required',
            'file_dokumen' => 'nullable|mimes:pdf',
            'file_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         
        // dd(Auth::user()->id);
        $user_id = Auth::user()->id;
        $aduan = Aduan::where('id', $id)->first();
        $aduan->update([
            'user_id' => $user_id,
            'nama_perangkat_daerah' => $request->nama_perangkat_daerah,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'nama_lokasi' => $request->nama_lokasi,
            'kondisi_lokasi' => $request->kondisi_lokasi,
            'alamat' => $request->alamat,
            'kota_atau_kabupaten' => $request->kota_atau_kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'permohonan_kecepatan_internet' => $request->permohonan_kecepatan_internet,
            'status' => 'menunggu',
            'alasan' => 'null',
        ]);

        if ($request->has('file_dokumen')) {
            // Lakukan tindakan jika validasi berhasil
            $product_image = $request->file('file_dokumen');
            $gambar = $product_image->getClientOriginalName();
            $tujuan_upload = './assets/image';
            $product_image->move($tujuan_upload, $gambar);

            $aduan->update([
            'file_dokumen' => $gambar,
            ]);
        }
       
        
         return redirect('aduan');
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aduan::where('id', $id)->delete();
        return redirect('/aduan');
    }
}
