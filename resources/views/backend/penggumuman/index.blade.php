@extends('layouts.kerangkabackend')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">Daftar Pengumuman</h5>
                <a href="{{ route('backend.penggumuman.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Tambah Pengumuman
                </a>
            </div>

            <div class="table-responsive text-nowrap p-3">
                <table class="table" id="myTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penggumuman as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <a href="{{ route('backend.penggumuman.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit-alt"></i> Edit
                                </a>
                                <form action="{{ route('backend.penggumuman.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
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
@endsection

@section('script')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
@endsection
