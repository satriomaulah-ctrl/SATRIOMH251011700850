@extends('layouts.app')

@section('title', 'Tambah Project')

@section('content')
<div class="container flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="fw-bold mb-4">Tambah Project</h2>

            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data"
                class="card card-body shadow-sm border-0">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" id="title" name="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="teknologi" class="form-label">Teknologi</label>
                    <input type="text" id="teknologi" name="teknologi"
                        class="form-control @error('teknologi') is-invalid @enderror" value="{{ old('teknologi') }}">
                    @error('teknologi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="selesai" @selected(old('status', 'selesai') == 'selesai')>Selesai</option>
                        <option value="In Progress" @selected(old('status') == 'In Progress')>In Progress</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (maks 2 MB)</label>
                    <input type="file" id="image" name="image"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('project.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection