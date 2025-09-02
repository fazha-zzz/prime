@extends('layouts.kerangkabackend')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable text-nonwrap">
                <div class="row card-header flex-column flex-md-row pb-0">
                    <div class="d-md-flex justify-content-between align-items-center col-md-auto me-auto mt-0">
                        <h5 class="card-title mb-0">Daftar Pembayaran</h5>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center col-md-auto ms-auto mt-0">
                        <div class="dt-buttons btn-group flex-wrap mb-0">
                            <a class="btn create-new btn-primary" href="{{ route('backend.pembayaran.create') }}">
                                <span class="d-flex align-items-center gap-2">
                                    <i class="icon-base bx bx-plus icon-sm"></i>
                                    <span class="d-none d-sm-inline-block">Tambah Data</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap m-3">
                    <table class="table" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Harga Keamanan</th>
                                <th>Harga kebersihan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ number_format($data->keamanan) }}</td>
                                <td>{{ number_format($data->kebersihan) }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ number_format($data->total) }}</td>
                                <td>
                                    @if($data->status == 'belum terbayar')
                                        <span class="badge bg-danger">Belum Terbayar</span>
                                    @elseif($data->status == 'pembayaran berhasil')
                                        <span class="badge bg-success">Lunas</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $data->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol Show -->
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalCenter-{{ $data->id }}">
                                        Show
                                    </button>

                                    <!-- Tombol Edit -->
                                    <a class="btn btn-warning btn-sm" href="{{ route('backend.pembayaran.edit', $data->id) }}">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('backend.pembayaran.destroy', $data->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" data-confirm-delete="true">
                                            <i class="bx bx-trash"></i>
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

    <!-- Modal Show -->
    @foreach($pembayaran as $data)
    <div class="modal fade" id="modalCenter-{{ $data->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Keamanan:</strong> {{ number_format($data->keamanan) }}</p>
                    <p><strong>kebersihan:</strong> {{ number_format($data->kebersihan) }}</p>
                    <p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
                    <p><strong>Total:</strong> {{ number_format($data->total) }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($data->status) }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
@endsection
