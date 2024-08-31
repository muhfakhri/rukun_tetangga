@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Warga
                        <a href="{{ route('warga.create') }}" class="btn btn-primary float-end">Tambah Warga</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warga as $w)
                            <tr>
                                <td>{{ $w->id }}</td>
                                <td>{{ $w->nama }}</td>
                                <td>{{ $w->alamat }}</td>
                                <td>{{ $w->no_hp }}</td>
                                <td>
                                    <a href="{{ route('warga.edit', $w->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('warga.destroy', $w->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
