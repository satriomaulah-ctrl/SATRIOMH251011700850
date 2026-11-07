@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h3>Dashboard</h3>
<p class="text-muted">Halo, {{ auth()->user()->name }}</p>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card card-body shadow-sm border-0">
            <small class="text-muted">Total Project</small>
            <h3 class="mb-0">{{ $total }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-body shadow-sm border-0">
            <small class="text-muted">Project Active</small>
            <h3 class="mb-0">{{ $active }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-body shadow-sm border-0">
            <small class="text-muted">Project Archived</small>
            <h3 class="mb-0">{{ $archived }}</h3>
        </div>
    </div>
</div>
@endsection