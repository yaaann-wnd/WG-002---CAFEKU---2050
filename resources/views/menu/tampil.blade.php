@extends('layouts.navbar')

@section('content')
<div class="text-center">
    <h3>Menu</h3>
</div>
<div class="mb-2">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
</div>
<table class="table table-hover text-center">
    <thead class="text-white bg-success">
        <tr>
            <td>No</td>
            <td>Nama menu</td>
            <td>Foto</td>
            <td>Harga</td>
            <td>Keterangan</td>
            <td>Kategori menu</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nama }}</td>
            <td><img src="{{ asset('storage/'.$d->foto) }}" class="rounded" alt="" width="75px"></td>
            <td>{{ $d->harga }}</td>
            <td>{{ $d->keterangan }}</td>
            <td>{{ $d->kategori->nama }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Edit</button>
                <form action="{{ route('menu.destroy', $d->id) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('delete')
                    <a href="#" onclick="return confirm('Yakin untuk menghapus data?')"> <button class="text-white btn btn-danger">Hapus</button> </a>
                </form>
            </td>
        </tr>
        <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('menu.update',$d->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Nama menu</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="{{ $d->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                <input type="number" min="1" class="form-control" id="exampleFormControlInput1" name="harga" value="{{ $d->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $d->keterangan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Foto sebelumnya</label>
                                <img src="{{ asset('storage/'.$d->foto) }}" class="rounded d-block" height="90px" alt="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Kategori</label>
                                <select name="kategori_id" class="form-select" id="">
                                    <option value="" disabled selected>-- Pilih kategori menu --</option>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id }}" {{ $k->id == $d->kategori_id? 'selected':'' }}>{{ $k->nama }}</option>
                                    @endforeach
                                </select>
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nama menu</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                        <input type="number" min="1" class="form-control" id="exampleFormControlInput1" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" id="">
                            <option value="" disabled selected>-- Pilih kategori menu --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
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