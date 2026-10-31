@extends('layouts.admin')

@section('title', 'Data Project')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Data Projects</h3>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Project</a>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card card-body shadow-sm border-0">
    <table id="tabelProject" class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Teknologi</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($project->image)
                    <img src="{{ asset('images/'.$project->image) }}" alt="" width="70" class="rounded">
                    @endif
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->teknologi }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->status }}</td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                        onsubmit="return confirm('Yakin hapus project ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#tabelProject', {
        columnDefs: [{ orderable: false, targets: [1, 6] }]
    });
</script>
@endpush