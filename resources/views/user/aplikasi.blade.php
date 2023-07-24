@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Aplikasi</h1>
        <p>Aplikasi yang anda ajukan, klik button dibawah untuk request aplikasi</p>
        <a class="btn btn-primary mb-4" href="/tambah_aplikasi">Request Aplikasi</a>

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
                                    </td>
                                    <td>
                                        @if ($aplikasi->status == 'menunggu')
                                            <a href="/aplikasi/edit/{{ $aplikasi->id }}"
                                                class="btn btn-success btn-sm rounded"><i class="fa-solid fa-pen"></i></a>
                                        @endif
                                        <a href="/aplikasi/hapus/{{ $aplikasi->id }}" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-xmark"></i></a>
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
