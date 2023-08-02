@extends('layouts.no_user')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@section('content')
    <header class="py-2">
        <div class="container px-5 pb-5">
            <div class="row">
                <h5 class="mt-3 mb-3">Homestay yang tersedia</h5>
                @foreach ($homestays as $homestay)
                    <div class="card col-md-3 border-0">
                        <img src="{{ asset('assets/images/' . $homestay->gambar) }}" class="card-img-top" alt="..."
                            style="height:250px; object-fit: cover;">
                        <div class="m-1">
                            <p class="card-title fw-bold">{{ $homestay->nama }}</h6>
                            <p class="card-text"
                                style="line-height: 1.2; height: calc(1.2em * 2); overflow: hidden; margin-bottom:0px;">
                                {{ $homestay->alamat }}</p>
                            <p class="card-text text-danger" style="margin-bottom:0px;">Rp. {{ $homestay->harga }} / Malam
                            </p>
                            <p class="card-text">{{ $homestay->pemilik['no_telephone'] }}</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/homestay_user/detail/{{ $homestay->id }}"
                                        class="btn btn-block btn-outline-success ">Detail</a>
                                </div>
                            </div>

                        </div>
                        <div class="m-3"></div>
                    </div>
                @endforeach
            </div>

        </div>
    </header>
@endsection
