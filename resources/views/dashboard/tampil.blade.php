@extends('layouts.navbar')

@section('content')
<div class="text-center mb-3">
    <h3>Order Menu</h3>
</div>
<div class="card p-4">
    <div class="row">
        <div class="col">
            <div class="text-center mb-3">
                <h5>Masukkan data pesanan</h5>
            </div>
            <form action="{{ route('dashboard.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Pesanan</label>
                    <input type="text" name="pesanan" class="form-control">
                    <span class="fst-italic">Note : Jika pesanan lebih dari 1 pisahkan dengan koma ","</span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" id="" class="form-select">
                        <option value="MEMBER">MEMBER</option>
                        <option value="NON-MEMBER">NON-MEMBER</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" value="Kirim" class="btn btn-primary w-25">
                </div>

            </form>
        </div>
        <div class="col">
            <div class="text-center mb-3">
                <h5>Struk pesanan</h5>
            </div>
            <div>
                <div class="mb-3">
                    <span>Nama : @isset($data)<span class="fw-semibold">{{ $data['nama'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span>Jumlah pesanan : @isset($data)<span class="fw-semibold">{{ $data['jumlah'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span>Total pesanan : @isset($data)<span class="fw-semibold">Rp {{ $data['total'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span>Status : @isset($data)<span class="fw-semibold">{{ $data['status'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span>Diskon : @isset($data)<span class="fw-semibold">{{ $data['diskon'] }}%</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span>Total pembayaran : @isset($data)<span class="fw-semibold">Rp {{ $data['bayar'] }}</span>@endisset</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
