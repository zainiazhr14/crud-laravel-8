@extends('layouts.master')
@section('content')
    <div class="container mt-4">
        <h3>Arsip Buku Perpustakaan Sekolah</h3>

        <form action="{{ route('buku.cari') }}" method="get">
        @csrf
        <div class="input-group my-3">
          <input type="text" class="form-control" placeholder="Cari Data Buku" name="cari">
          <button type="submit" class="btn btn-secondary p-1">Cari</button>
        </div>
        </form>
        @if (count($data_buku))
        

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

          @else
          <div class="alert alert-success" role="alert">
            Hasil {{ count($data_buku) }} dari {{ $jumlah_buku }} data. Dari Pencarian {{ $cari }}
            <div>
                <a href="/buku" class="btn btn-secondary p-3">Kembali</a>
            </div>
          </div>
        @endif
          <div class="row">
          <div class="col-10">
            Jumlah Buku : {{ $jumlah_buku }}
          </div>
          <div class="col-2">
            {{ $data_buku->links() }}
          </div>
        </div>
          
    </div>


</div>

@endsection