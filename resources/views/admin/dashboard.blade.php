@extends('layouts.admin')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="fw-bold">CMS Dashboard</h1>
        <p class="text-muted mb-0">Manage the public website content and future portal labels.</p>
    </div>
    <a class="btn btn-mace" href="{{ route('admin.settings') }}">Edit Site Settings</a>
</div>
<div class="row g-4 mb-4">
    @foreach($counts as $label => $count)
    <div class="col-sm-6 col-xl-4">
        <div class="card admin-card p-4">
            <span class="text-muted">{{ $label }}</span>
            <strong class="display-6">{{ $count }}</strong>
        </div>
    </div>
    @endforeach
</div>
<div class="card admin-card p-4">
    <h4>Recent Notices</h4>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Title</th><th>Status</th><th>Created</th></tr></thead>
            <tbody>
            @foreach($notices as $notice)
                <tr>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $notice->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
