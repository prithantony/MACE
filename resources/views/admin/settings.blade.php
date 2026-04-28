@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h1 class="fw-bold">Site Settings</h1>
    <p class="text-muted mb-0">Manage logo path, homepage banner, contact details, footer content, and SEO defaults.</p>
</div>
<form class="card admin-card p-4" method="post" action="{{ route('admin.settings.update') }}">
    @csrf
    @php($fields = [
        'site_logo' => 'Site logo path',
        'home_hero_image' => 'Homepage hero/banner image path',
        'site_name' => 'Site name',
        'contact_phone' => 'Contact phone',
        'whatsapp_number' => 'WhatsApp number',
        'contact_email' => 'Contact email',
        'contact_email_2' => 'Contact email 2',
        'contact_address' => 'Contact address',
        'map_coordinate' => 'Map coordinate / plus code',
        'about_image' => 'About page image path',
        'contact_image' => 'Contact section image path',
        'footer_about' => 'Footer content',
        'seo_title' => 'SEO title',
        'seo_meta_description' => 'SEO meta description',
        'portal_staff_label' => 'Staff portal label',
        'portal_student_label' => 'Student portal label',
        'portal_lms_label' => 'LMS portal label',
        'portal_exam_label' => 'Exam portal label',
    ])
    <div class="row g-3">
        @foreach($fields as $key => $label)
        <div class="{{ str_contains($key, 'description') || str_contains($key, 'footer') || str_contains($key, 'address') ? 'col-12' : 'col-md-6' }}">
            <label class="form-label">{{ $label }}</label>
            @if(str_contains($key, 'description') || str_contains($key, 'footer') || str_contains($key, 'address'))
                <textarea class="form-control" rows="3" name="{{ $key }}">{{ old($key, $settings->get($key)?->value) }}</textarea>
            @else
                <input class="form-control" name="{{ $key }}" value="{{ old($key, $settings->get($key)?->value) }}">
            @endif
        </div>
        @endforeach
    </div>
    <button class="btn btn-mace mt-4">Save Settings</button>
</form>
@endsection
