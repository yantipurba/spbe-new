@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Request Hosting</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/hosting/update/{{$hosting->id}}" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name="status" value="menunggu"/>
                            <input type="hidden" name="alasan" value="null"/>
                            <h5 class="font-weight-bold">Kebutuhan Hosting</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_aplikasi">Nama aplikasi</label>
                                        <input type="text"
                                            class="form-control @error('nama_aplikasi') is-invalid @enderror"
                                            id="nama_aplikasi" name="nama_aplikasi" value="{{ $hosting->nama_aplikasi }}">
                                        @error('nama_aplikasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kebutuhan_hosting">Kebutuhan hosting</label>
                                        <select class="form-control" id="kebutuhan_hosting" name="kebutuhan_hosting">
                                            <option>Sub Domain</option>
                                            <option>Ip Public</option>
                                        </select>
                                        @error('kebutuhan_hosting')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="usulan_sub_domain">Usulan sub domain</label>
                                        <input type="text"
                                            class="form-control @error('usulan_sub_domain') is-invalid @enderror"
                                            id="usulan_sub_domain" name="usulan_sub_domain"
                                            value="{{ $hosting->usulan_sub_domain}}">
                                        @error('usulan_sub_domain')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-3 font-weight-bold">Informasi pemohon</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pemohon">Nama</label>
                                        <input type="text" class="form-control @error('nama_pemohon') is-invalid @enderror" id="nama_pemohon"
                                            name="nama_pemohon" value="{{ $hosting->nama_pemohon }}">
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
                                            name="nip_pemohon" value="{{ $hosting->nip_pemohon }}">
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
                                            name="nama_perangkat_daerah" value="{{ $hosting->nama_perangkat_daerah }}">
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
                                            name="jabatan_pemohon" value="{{ $hosting->jabatan_pemohon }}">
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
                                            name="no_telp_pemohon" value="{{ $hosting->no_telp_pemohon }}">
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
                                            name="email_pemohon" value="{{ $hosting->email_pemohon }}">
                                        @error('email_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-3 font-weight-bold">Informasi Penanggung jawab</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pj">Nama</label>
                                        <input type="text" class="form-control @error('nama_pj') is-invalid @enderror" id="nama_pj"
                                            name="nama_pj" value="{{ $hosting->nama_pj }}">
                                        @error('nama_pj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip_pj">NIP</label>
                                        <input type="number" class="form-control @error('nip_pj') is-invalid @enderror" id="nip_pj"
                                            name="nip_pj" value="{{ $hosting->nip_pj }}">
                                        @error('nip_pj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan_pj">jabatan</label>
                                        <input type="text" class="form-control @error('jabatan_pj') is-invalid @enderror" id="jabatan_pj"
                                            name="jabatan_pj" value="{{ $hosting->jabatan_pj }}">
                                        @error('jabatan_pj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp_pj">no telp</label>
                                        <input type="number" class="form-control @error('no_telp_pj') is-invalid @enderror" id="no_telp_pj"
                                            name="no_telp_pj" value="{{ $hosting->no_telp_pj }}">
                                        @error('no_telp_pj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_pj">Email</label>
                                        <input type="email" class="form-control @error('email_pj') is-invalid @enderror" id="email_pj"
                                            name="email_pj" value="{{ $hosting->email_pj }}">
                                        @error('email_pj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Create Hosting</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
