@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Aplikasi</h1>
        <p>Aplikasi yang telah diajukan, klik button action untuk melakukan aksi pada request</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Request</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Nama dinas</th>
                                <th>Email</th>
                                <th>File</th>
                                <th>Tanggal dibuat</th>
                                <th>Status</th>
                                <th>Alasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aplikasis as $aplikasi)
                                <tr>
                                    <td>{{ $aplikasi->nama }}</td>
                                    <td>{{ $aplikasi->nip }}</td>
                                    <td>{{ $aplikasi->nama_dinas }}</td>
                                    <td>{{ $aplikasi->email }}</td>
                                    <td>
                                        <a href="/assets/image/{{ $aplikasi->file }}">{{ $aplikasi->file }}</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $aplikasi->created_at }}</span>
                                    </td>
                                    <td>
                                        @if ($aplikasi->status == 'menunggu')
                                            <span class="badge badge-pill badge-info">{{ $aplikasi->status }}</span>
                                        @elseif ($aplikasi->status == 'ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $aplikasi->status }}</span>
                                        @elseif ($aplikasi->status == 'diterima')
                                            <span class="badge badge-pill badge-success">{{ $aplikasi->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($aplikasi->status == 'menunggu')
                                        @elseif ($aplikasi->status == 'ditolak')
                                                {{$aplikasi->alasan}}
                                        @elseif ($aplikasi->status == 'diterima')
                                        @endif
                                    <td>
                                        @if ($aplikasi->status == 'menunggu')
                                            <a href="/aplikasi/setuju/{{ $aplikasi->id }}"
                                                class="btn btn-success btn-sm rounded"><i class="fa-solid fa-check"></i></a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#setuju{{ $aplikasi->id }}">
                                                <i class="fa-solid fa-xmark"></i></a>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="setuju{{ $aplikasi->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Permintan
                                                                Aplikasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/aplikasi/alasan/create/{{$aplikasi->id}}" method="post"
                                                                enctype="multipart/form-data" id="formTambahData">
                                                                @csrf
                                                                <h5 class="font-weight-bold">{{ $aplikasi->nama }}</h5>
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
                                            {{-- <a href="/aplikasi/ditolak/{{ $aplikasi->id }}"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a> --}}
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
