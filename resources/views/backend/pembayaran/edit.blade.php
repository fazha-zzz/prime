@extends('layouts.kerangkabackend')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-6 gy-6">
            <div class="col-xxl">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.pembayaran.update', $pembayaran->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" value="{{ old('tanggal', $pembayaran->tanggal) }}" class="form-control">
                                @error('tanggal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="belum terbayar" {{ $pembayaran->status == 'belum terbayar' ? 'selected' : '' }}>Belum Terbayar</option>
                                    <option value="pembayaran berhasil" {{ $pembayaran->status == 'pembayaran berhasil' ? 'selected' : '' }}>Pembayaran Berhasil</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Total</label>
                                <input type="text" class="form-control" value="{{ $pembayaran->total }}" disabled>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('backend.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
