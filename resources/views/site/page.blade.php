@extends('layouts.site')

@section('content')
@if($page->slug === 'about-us')
<x-page-banner image="images/AboutUS.png" href="#about-content" alt="About Makeni College of Education banner" />

<section class="py-20">
    <div id="about-content" class="mx-auto grid max-w-7xl scroll-mt-28 gap-8 px-4 sm:px-6 lg:grid-cols-[1.15fr_0.85fr] lg:px-8">
        <article class="fade-up rounded-[2rem] bg-white p-8 text-lg leading-8 text-slate-700 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            @foreach(collect(explode("\n\n", $page->body))->take(7) as $paragraph)
                <p class="mb-6 last:mb-0">{{ $paragraph }}</p>
            @endforeach
        </article>

        <aside class="grid content-start gap-5">
            <div class="fade-up rounded-[2rem] bg-[#06320d] p-7 text-white shadow-[0_16px_40px_rgba(15,54,25,0.18)]">
                <h2 class="text-2xl font-black">Our Core Focus</h2>
                <div class="mt-5 grid gap-3 text-green-50/90">
                    <span class="rounded-2xl bg-white/10 px-4 py-3">Academic Excellence in Teacher Training</span>
                    <span class="rounded-2xl bg-white/10 px-4 py-3">Practical and Hands-on Learning</span>
                    <span class="rounded-2xl bg-white/10 px-4 py-3">Professional Discipline and Ethics</span>
                    <span class="rounded-2xl bg-white/10 px-4 py-3">Community Engagement and Impact</span>
                </div>
            </div>
            <div class="fade-up rounded-[2rem] bg-[#f7fbf6] p-7 shadow-[0_16px_40px_rgba(15,54,25,0.08)] ring-1 ring-green-900/10">
                <div class="mb-5 grid h-14 w-14 place-items-center rounded-2xl bg-[#006b12] text-white shadow-lg shadow-green-900/20">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-[#12351d]">Our Vision</h2>
                <p class="mt-3 leading-7 text-slate-600">To be a leading teacher education institution in Zambia, recognized for producing transformative educators.</p>
            </div>
            <div class="fade-up rounded-[2rem] bg-white p-7 shadow-[0_16px_40px_rgba(15,54,25,0.08)] ring-1 ring-green-900/10">
                <div class="mb-5 grid h-14 w-14 place-items-center rounded-2xl bg-[#c9a227] text-[#12351d] shadow-lg shadow-yellow-900/10">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M12 3v18"/>
                        <path d="m5 10 7-7 7 7"/>
                        <path d="M5 21h14"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-[#12351d]">Our Mission</h2>
                <p class="mt-3 leading-7 text-slate-600">To train and empower teachers with the skills, knowledge, and values needed to educate, inspire, and lead.</p>
            </div>
        </aside>
    </div>
</section>
@else
<section class="bg-[#f7fbf6] py-20">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <p class="text-sm font-bold uppercase tracking-[0.24em] text-[#006b12]">Makeni College of Education Zambia</p>
        <h1 class="mt-3 text-4xl font-black text-[#12351d] md:text-5xl">{{ $page->title }}</h1>
        @if($page->excerpt)<p class="mt-5 text-lg leading-8 text-slate-600">{{ $page->excerpt }}</p>@endif
    </div>
</section>
<section class="py-20">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl bg-white p-8 text-lg leading-8 text-slate-700 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            {!! nl2br(e($page->body)) !!}
        </div>
    </div>
</section>
@endif
@endsection
