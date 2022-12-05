@extends('navbar')

@section('content')
<div class="menu">
    <div class="text-center mb-3">
        <h3>Menu</h3>
    </div>
    @foreach($data as $d)
    <div class="card p-4 rounded-3 mb-4">
        <div class="d-flex align-items-center">
            <div>
                <img src="{{ asset('storage/'.$d->foto) }}" class="rounded-3" width="150px" alt="">
            </div>
            <div class="ms-3">
                <div class="row">
                    <h4>{{ $d->nama }}</h4>
                </div>
                <div class="row">
                    <span>Harga : <span class="fw-semibold">{{ $d->harga }}</span></span>
                </div>
                <div class="row">
                    <span>Kategori : <span class="fw-semibold">{{ $d->kategori->nama }}</span></span>
                </div>
                <div class="row">
                    <span>Keterangan : <span class="fw-semibold">{{ $d->keterangan }}</span></span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
