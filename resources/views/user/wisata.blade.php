@extends('layouts.user')
@section('content')
    <div class="flex ml-44 mt-20 flex-wrap">
        @foreach ($wisata as $key => $ws)
            <div class="card w-1/4">
                <img src="{{ asset('storage/img/' . $ws->img_wisata) }}" alt="{{ $ws->nama_wisata }}" class="img-list"
                    width="100" height="100">
                <div class="d-flex">
                    <h3 class="card-title mr-7 mb-3 d-flex">{{ $ws->nama_wisata }}</h3>
                    <a href="/user/detail/{{ $ws->id }}" style="background: #B19470" class="text-white px-4 py-2 rpunded-full  mt-2">Detail</a>
                </div>
                <button></button>
            </div>
        @endforeach
        </div>
@endsection
