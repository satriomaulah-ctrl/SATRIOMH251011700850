@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="card card-body shadow-sm border-0">
    <h3 class="mb-3">Edit Project</h3>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Nama Project</label>
                <input type="text" id="title" name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $project->title) }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="teknologi" class="form-label">Teknologi</label>
                <input type="text" id="teknologi" name="teknologi"
                    class="form-control @error('teknologi') is-invalid @enderror"
                    value="{{ old('teknologi', $project->teknologi) }}">
                @error('teknologi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">Pilih Status</option>
                    <option value="active" @selected(old('status', $project->status) == 'active')>active</option>
                    <option value="archived" @selected(old('status', $project->status) == 'archived')>archived</option>
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label">Image (kosongkan jika tidak diganti)</label>
                <input type="file" id="image" name="image"
                    class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                @if ($project->image)
                <img src="{{ asset('images/'.$project->image) }}" alt="" height="60" class="mt-2 rounded">
                @endif
            </div>

            <div class="col-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection