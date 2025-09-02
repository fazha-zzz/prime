@extends('layouts.kerangkabackend')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endsection

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-6 gy-6">
      <div class="col-xxl">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Pengumuman</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.penggumuman.store') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" class="form-control">
                @error('tanggal')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex justify-content-end">
                <a href="{{ route('backend.penggumuman.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
