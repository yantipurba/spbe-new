@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Request Rekomendasi</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/rekomendasi/update/{{$rekomendasi->id}}" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name="status" value="menunggu"/>
                            <input type="hidden" name="alasan" value="null"/>

                            <h5 class="font-weight-bold">Informasi pemohon</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pemohon">Nama</label>
                                        <input type="text" class="form-control @error('nama_pemohon') is-invalid @enderror" id="nama_pemohon"
                                            name="nama_pemohon" value="{{ $rekomendasi->nama_pemohon }}">
                                        @error('nama_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip_pemohon">NIP</label>
                                        <input type="number" class="form-control @error('nip_pemohon') is-invalid @enderror" id="nip_pemohon"
                                            name="nip_pemohon" value="{{ $rekomendasi->nip_pemohon }}">
                                        @error('nip_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_perangkat_daerah">Nama perangkat daerah</label>
                                        <input type="text" class="form-control @error('nama_perangkat_daerah') is-invalid @enderror" id="nama_perangkat_daerah"
                                            name="nama_perangkat_daerah" value="{{ $rekomendasi->nama_perangkat_daerah }}">
                                        @error('nama_perangkat_daerah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan_pemohon">jabatan</label>
                                        <input type="text" class="form-control @error('jabatan_pemohon') is-invalid @enderror" id="jabatan_pemohon"
                                            name="jabatan_pemohon" value="{{ $rekomendasi->jabatan_pemohon }}">
                                        @error('jabatan_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp_pemohon">no telp</label>
                                        <input type="number" class="form-control @error('no_telp_pemohon') is-invalid @enderror" id="no_telp_pemohon"
                                            name="no_telp_pemohon" value="{{ $rekomendasi->no_telp_pemohon }}">
                                        @error('no_telp_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_pemohon">Email</label>
                                        <input type="email" class="form-control @error('email_pemohon') is-invalid @enderror" id="email_pemohon"
                                            name="email_pemohon" value="{{ $rekomendasi->email_pemohon }}">
                                        @error('email_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Create Rekomendasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
