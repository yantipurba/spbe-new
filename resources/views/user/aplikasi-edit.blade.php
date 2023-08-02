@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Request Aplikasi</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/aplikasi/update/{{$aplikasi->id}}" method="post" enctype="multipart/form-data" id="formTambahData">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ $aplikasi->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nip">Nip</label>
                                <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                    name="nip" value="{{ $aplikasi->nip }}">
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_dinas">Nama dinas</label>
                                <input type="text" class="form-control @error('nama_dinas') is-invalid @enderror"
                                    id="nama_dinas" name="nama_dinas" value="{{ $aplikasi->nama_dinas }}">
                                @error('nama_dinas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" value="{{ $aplikasi->jabatan }}">
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">no telp</label>
                                <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                    id="no_telp" name="no_telp" value="{{ $aplikasi->no_telp }}">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ $aplikasi->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="">Upload Dokumen Aplikasi</label>
                                    <input type="file" 
                                    class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" value="{{ old('file') }}">
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                            <button type="submit" class="btn btn-primary btn-block">Update Request</button>
                        </form>
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
            </div>
        </div>
    </div>
@endsection
