@extends('layouts.navbar')

@section('content')
<div class="text-center">
    <h3>Kategori Menu</h3>
</div>
<div class="mb-2">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
</div>
<table class="table table-hover text-center">
    <thead class="text-white bg-success">
        <tr>
            <td>No</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nama }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Edit</button>
                <form action="{{ route('kategori.destroy', $d->id) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('delete')
                    <a href="#" onclick="return confirm('Yakin untuk menghapus data?')"> <button class="text-white btn btn-danger">Hapus</button> </a>
                </form>
            </td>
        </tr>
        <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kategori.update',$d->id) }}" method="POST">
                    <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="{{ $d->nama }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>

{{-- modal create --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori.store') }}" method="POST">
            <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal create --}}
@endsection