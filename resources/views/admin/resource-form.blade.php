@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h1 class="fw-bold">{{ $item->exists ? 'Edit' : 'Create' }} {{ $config['title'] }}</h1>
    <p class="text-muted mb-0">Fields are intentionally plain so the CMS remains easy to extend.</p>
</div>
<form class="card admin-card p-4" method="post" action="{{ $item->exists ? route('admin.resource.update', [$resource, $item->id]) : route('admin.resource.store', $resource) }}">
    @csrf
    @if($item->exists) @method('PUT') @endif
    <div class="row g-3">
        @foreach($config['fields'] as $field)
        @php($value = old($field, $item->{$field} ?? ''))
        <div class="{{ in_array($field, ['body','description','requirements','caption','excerpt','subtext','note','hero_subtitle','meta_description'], true) ? 'col-12' : 'col-md-6' }}">
            @if(str_starts_with($field, 'is_'))
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" name="{{ $field }}" value="1" id="{{ $field }}" @checked((bool)$value)>
                    <label class="form-check-label" for="{{ $field }}">{{ str_replace('_', ' ', ucfirst($field)) }}</label>
                </div>
            @elseif($field === 'department_id')
                <label class="form-label">Department</label>
                <select class="form-select" name="{{ $field }}">
                    <option value="">No department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" @selected((string)$value === (string)$department->id)>{{ $department->title }}</option>
                    @endforeach
                </select>
            @elseif(in_array($field, ['body','description','requirements','caption','excerpt','subtext','note','hero_subtitle','meta_description'], true))
                <label class="form-label">{{ str_replace('_', ' ', ucfirst($field)) }}</label>
                <textarea class="form-control" rows="5" name="{{ $field }}">{{ $value }}</textarea>
            @elseif($field === 'password')
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="{{ $field }}" placeholder="{{ $item->exists ? 'Leave blank to keep current password' : '' }}">
            @elseif(str_ends_with($field, '_at'))
                <label class="form-label">{{ str_replace('_', ' ', ucfirst($field)) }}</label>
                <input class="form-control" type="date" name="{{ $field }}" value="{{ $value ? \Illuminate\Support\Carbon::parse($value)->format('Y-m-d') : '' }}">
            @else
                <label class="form-label">{{ str_replace('_', ' ', ucfirst($field)) }}</label>
                <input class="form-control" name="{{ $field }}" value="{{ $value }}">
            @endif
        </div>
        @endforeach
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn btn-mace">Save</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.resource.index', $resource) }}">Cancel</a>
    </div>
</form>
@endsection
