@extends('layouts.master')
@section('content')
    <div class="container mt-4">
        <h3>Arsip Buku Perpustakaan Sekolah</h3>
        @if (Session::has('pesan'))
        <div class="alert alert-primary" role="alert">
          {{ Session::get('pesan') }}
        </div>
        @endif
        <form action="{{ route('buku.cari') }}" method="get">
        @csrf
        <div class="input-group my-3">
          <input type="text" class="form-control" placeholder="Cari Data Buku" name="cari">
          <button type="submit" class="btn btn-secondary p-1">Cari</button>
        </div>
        </form>
        
        <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary p-1 my-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data Buku
          </button>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Jumlah Halaman</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data_buku as $buku)
              <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->halaman }}</td>
                <td>
                  <form action="{{ route('buku.delete', $buku->id) }}" method="get">
                  @csrf
                      <button type="submit" class="btn btn-danger p-1" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')">Hapus</button>
                      <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-success">Edit</a>
                    </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          <div class="row">
          <div class="col-10">
            Jumlah Buku : {{ $jumlah_buku }}
          </div>
          <div class="col-2">
            {{ $data_buku->links() }}
          </div>
        </div>
          
    </div>


    <!-- Modal Tambah Data-->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('buku.store') }}">
        @csrf
      <div class="modal-body">
      @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
      @endif
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul">
          </div>
          <div class="mb-3">
            <label for="penulis" class="form-label">Penulis Buku</label>
            <input type="text" class="form-control" id="penulis" name="penulis">
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit Buku</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit">
          </div>
          <div class="mb-3">
            <label for="halaman" class="form-label">Halaman Buku</label>
            <input type="text" class="form-control" id="halaman" name="halaman">
          </div>
          
       


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection