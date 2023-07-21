@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Rekomendasi</h1>
        <p>Rekomendasi yang telah diajukan, klik button aksi untuk menolak atau menerima rekomendasi</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Request Rekomendasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pemohon</th>
                                <th>Jabatan Pemohon</th>
                                <th>Email Pemohon</th>
                                <th>Tanggal dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekomendasis as $rekomendasi)
                                <tr>
                                    <td>{{ $rekomendasi->nama_pemohon }}</td>
                                    <td>{{ $rekomendasi->jabatan_pemohon }}</td>
                                    <td>
                                        {{ $rekomendasi->email_pemohon }}
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $rekomendasi->created_at }}</span>
                                    </td>
                                    <td>
                                        @if ($rekomendasi->status == 'menunggu')
                                            <span class="badge badge-pill badge-info">{{ $rekomendasi->status }}</span>
                                        @elseif ($rekomendasi->status == 'ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $rekomendasi->status }}</span>
                                        @elseif ($rekomendasi->status == 'diterima')
                                            <span class="badge badge-pill badge-success">{{ $rekomendasi->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($rekomendasi->status == 'menunggu')
                                            <a href="/rekomendasi/setuju/{{ $rekomendasi->id }}"
                                                class="btn btn-success btn-sm rounded"><i class="fa-solid fa-pen"></i></a>

                                            {{-- <a href="/rekomendasi/hapus/{{ $rekomendasi->id }}" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-xmark"></i></a> --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#setuju{{ $rekomendasi->id }}">
                                                <i class="fa-solid fa-xmark"></i></a>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="setuju{{ $rekomendasi->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Permintan
                                                                rekomendasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="/rekomendasi/alasan/create/{{ $rekomendasi->id }}"
                                                                method="post" enctype="multipart/form-data"
                                                                id="formTambahData">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlTextarea1">Alasan
                                                                                Penolakan</label>
                                                                            <textarea name="alasan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
