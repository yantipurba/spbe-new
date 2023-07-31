<!-- resources/views/create_aduan.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Request Aduan Jaringan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <form action="/create_aduan" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            <input type="hidden" name="status" value="menunggu" />
                            <input type="hidden" name="alasan" value="null" />
                            <h5 class="font-weight-bold">Informasi Pemohon</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_perangkat_daerah">Nama Perangkat Daerah</label>
                                        <input type="text"
                                            class="form-control @error('nama_perangkat_daerah') is-invalid @enderror"
                                            id="nama_perangkat_daerah" name="nama_perangkat_daerah" value="{{ old('nama_perangkat_daerah') }}">
                                        @error('nama_perangkat_daerah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                            name="nip" value="{{ old('nip') }}">
                                        @error('nip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama"
                                            value="{{ old('nama') }}">
                                        @error('nama_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jabatan_pemohon">Jabatan</label>
                                        <input type="text"
                                            class="form-control @error('jabatan') is-invalid @enderror"
                                            id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                                        @error('jabatan_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_telp_pemohon">No.Telp</label>
                                        <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                            name="no_telp" value="{{ old('no_telp') }}">
                                        @error('no_telp_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email_pemohon">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" value="{{ old('email') }}">
                                        @error('email_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-3 font-weight-bold">Informasi Lokasi</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_lokasi">Nama Lokasi</label>
                                        <input type="text"
                                            class="form-control @error('nama_lokasi') is-invalid @enderror"
                                            id="nama_lokasi" name="nama_lokasi" value="{{ old('nama_lokasi') }}">
                                        @error('nama_lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kondisi_lokasi">Kondisi Lokasi</label>
                                        <input type="text" class="form-control @error('kondisi_lokasi') is-invalid @enderror"
                                        id="kondisi_lokasi"
                                        name="kondisi_lokasi" value="{{ old('kondisi_lokasi') }}">
                                        @error('kondisi_lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="alamat_lokasi">Alamat</label>
                                        <input type="text"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat"
                                            name="alamat" value="{{ old('alamat') }}">
                                        @error('alamat_lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rt_pemohon">RT</label>
                                        <input type="text"
                                            class="form-control @error('rt') is-invalid @enderror"
                                            id="rt_pemohon" name="RT" value="{{ old('rt_pemohon') }}">
                                        @error('rt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <input type="number" class="form-control @error('nip_pemohon') is-invalid @enderror" id="nip_pemohon"
                                            name="RW" value="{{ old('nip_pemohon') }}">
                                        @error('nip_pemohon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kota_kabupaten">Kota atau Kabupaten</label>
                                    <select class="form-control" id="kota_kabupaten" name="kota_atau_kabupaten">
                                        <option value="">Pilih Kota/Kabupaten</option>
                                        <!-- Options for kabupaten will be populated here -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <select class="form-control" id="kelurahan" name="kelurahan">
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="mt-3 font-weight-bold">Informasi Kebutuhan Koneksi Internet</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_aduan">Permohonan Kecepatan Internet</label>
                                        <input type="text"
                                            class="form-control @error('permohonan_kecepatan_internet') is-invalid @enderror"
                                            id="permohonan_kecepatan_internet" name="permohonan_kecepatan_internet" value="{{ old('permohonan_kecepatan_internet') }}">
                                        @error('permohonan_kecepatan_internet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
        <div class="form-group">
            <label for="">Upload Dokumen Penunjang Akses Internet</label>
            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
            @error('gambar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="">Upload Gambar Lokasi</label>
            <input type="file" name="gambar" class="form-control @error('file_gambar') is-invalid @enderror">
            @error('file_gambar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
                        </div>
                            <button type="submit" class="btn btn-primary btn-block">create request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to populate the options in a select element
        function populateSelectOptions(selectId, data) {
            const selectElement = document.getElementById(selectId);
            selectElement.innerHTML = '<option value="">Pilih</option>';
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                selectElement.appendChild(option);
            });
        }

        //  kabupaten
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/12.json')
            .then(response => response.json())
            .then(regencies => {
                populateSelectOptions('kota_kabupaten', regencies);

                document.getElementById('kota_kabupaten').addEventListener('change', function() {
                    const selectedRegencyId = this.value;

                    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${selectedRegencyId}.json`)
                        .then(response => response.json())
                        .then(districts => {
                            //  kecamatan
                            populateSelectOptions('kecamatan', districts);
                        });
                });
            });

        document.getElementById('kecamatan').addEventListener('change', function() {
            const selectedDistrictId = this.value;

            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${selectedDistrictId}.json`)
                .then(response => response.json())
                .then(villages => {
                    populateSelectOptions('kelurahan', villages);
                });
        });
    </script>
@endsection
