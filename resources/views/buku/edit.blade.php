@extends('layouts.master')
@section('content')

    <div class="container mt-5">
        <form action="{{ route('buku.update', $buku->id) }}" method="post">
            @csrf
                <h3>Edit Data Buku</h3>
                @if (count($errors) > 0)
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item bg-dark text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
              </div>
              <div class="mb-3">
                <label for="penulis" class="form-label">Penulis Buku</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku->penulis }}">
              </div>
              <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit Buku</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}">
              </div>
              <div class="mb-3">
                <label for="halaman" class="form-label">Halaman Buku</label>
                <input type="text" class="form-control" id="halaman" name="halaman" value="{{ $buku->halaman }}">
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="/buku" class="btn btn-warning">Kembali</a>
        </form>
    </div>

@endsection