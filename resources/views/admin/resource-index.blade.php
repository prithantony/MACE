@extends('layouts.admin')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="fw-bold">{{ $config['title'] }}</h1>
        <p class="text-muted mb-0">Create and edit CMS records.</p>
    </div>
    <a class="btn btn-mace" href="{{ route('admin.resource.create', $resource) }}">Add New</a>
</div>
<div class="card admin-card p-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
            <tr>
                <th>Title / Name</th>
                <th>Slug / Key</th>
                <th>Updated</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->title ?? $item->headline ?? $item->name ?? $item->label ?? $item->key }}</td>
                <td>{{ $item->slug ?? $item->key ?? $item->email ?? '-' }}</td>
                <td>{{ optional($item->updated_at)->format('d M Y') }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.resource.edit', [$resource, $item->id]) }}">Edit</a>
                    <form class="d-inline" method="post" action="{{ route('admin.resource.destroy', [$resource, $item->id]) }}" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $items->links() }}
</div>
@endsection
