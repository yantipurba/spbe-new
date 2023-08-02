@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Hosting</h1>
        <p>Hosting yang telah diajukan, klik button action untuk melakukan aksi pada request</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Request Hosting</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama hosting</th>
                                <th>Kebutuhan Hosting</th>
                                <th>Usulan Hosting</th>
                                <th>Nama Pemohon</th>
                                <th>Email Pemohon</th>
                                <th>Tanggal dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hostings as $hosting)
                                <tr>
                                    <td>{{ $hosting->nama_aplikasi }}</td>
                                    <td>{{ $hosting->kebutuhan_hosting }}</td>
                                    <td>{{ $hosting->usulan_sub_domain }}</td>
                                    <td>{{ $hosting->nama_pemohon }}</td>
                                    <td>
                                        {{ $hosting->email_pemohon }}
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $hosting->created_at }}</span>
                                    </td>
                                    <td>
                                        @if ($hosting->status == 'menunggu')
                                            <span class="badge badge-pill badge-info">{{ $hosting->status }}</span>
                                        @elseif ($hosting->status == 'ditolak')
                                            <span class="badge badge-pill badge-danger">{{ $hosting->status }}</span>
                                        @elseif ($hosting->status == 'diterima')
                                            <span class="badge badge-pill badge-success">{{ $hosting->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($hosting->status == 'menunggu')
                                            <a href="/hosting/setuju/{{$hosting->id}}" class="btn btn-success btn-sm rounded"><i
                                                    class="fa-solid fa-check"></i></a>
                                            {{-- <a href="/hosting/ditolak/{{$hosting->id}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a> --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#setuju{{ $hosting->id }}">
                                                <i class="fa-solid fa-xmark"></i></a>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="setuju{{ $hosting->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Permintan
                                                                hosting</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/hosting/alasan/create/{{$hosting->id}}" method="post"
                                                                enctype="multipart/form-data" id="formTambahData">
                                                                @csrf
                                                                <h5 class="font-weight-bold">{{ $hosting->nama_aplikasi }}</h5>
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
