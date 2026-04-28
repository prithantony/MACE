@extends('layouts.site')

@section('content')
<section class="bg-[#f7fbf6] py-20">
    <x-section-heading eyebrow="Study With Us" title="Programmes and Courses" body="Teacher education and vocational training programmes currently managed under the college CMS." />
</section>
<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($programmes as $programme)
                <x-program-card :programme="$programme" />
            @endforeach
        </div>
        <div class="mt-16">
            <x-section-heading eyebrow="Fees" title="Programme Fee Guidance" body="Current official amounts are confirmed by admissions for each intake." />
            <div class="mt-10">
                <x-fees-table :fees="$fees" />
            </div>
        </div>
    </div>
</section>
@endsection
