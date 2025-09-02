@extends('layouts.kerangkabackend')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-6 gy-6">
            <div class="col-xxl">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Pembayaran</h5>
                        <small class="text-body-secondary">Form Input</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.pembayaran.store') }}" method="post">
                            @csrf
                            
                            <!-- Tanggal -->
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" class="form-control" required>
                                @error('tanggal')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">Keamanan</label>
                                <input type="text" class="form-control" value="101120" disabled>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">kebersihan</label>
                                <input type="text" class="form-control" value="40000" disabled>
                            </div>

                            <!-- Status (default belum terbayar) -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="belum terbayar" selected>Belum Terbayar</option>
                                    <option value="pembayaran berhasil">Pembayaran Berhasil</option>
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('backend.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
@endsection
