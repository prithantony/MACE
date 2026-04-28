@extends('layouts.site')

@section('content')
<section class="relative min-h-[680px] overflow-hidden bg-[#06320d] text-white">
    @foreach($heroSlides as $slide)
        <div data-hero-slide class="hero-slide absolute inset-0">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset($slide->image ?: $siteSettings->get('home_hero_image', 'images/Banners.jpg')) }}" alt="{{ $slide->headline }}">
            <div class="absolute inset-0 bg-gradient-to-r from-[#06320d]/92 via-[#006b12]/72 to-[#06320d]/20"></div>
            <a class="absolute inset-0 z-[1]" href="{{ $slide->cta_url ?: route('contact').'#enquiry-form' }}" aria-label="{{ $slide->cta_label }}"></a>
            <div class="relative z-10 mx-auto flex min-h-[680px] max-w-7xl items-center px-4 py-24 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="mb-4 inline-flex rounded-full bg-white/10 px-4 py-2 text-sm font-bold uppercase tracking-[0.2em] text-green-50 ring-1 ring-white/20">Makeni College of Education</p>
                    <h1 class="text-4xl font-black leading-tight tracking-normal md:text-6xl">{{ $slide->headline }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-green-50/90 md:text-xl">{{ $slide->subtext }}</p>
                    <a href="{{ $slide->cta_url ?: route('contact').'#enquiry-form' }}" class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-black text-[#006b12] shadow-2xl shadow-black/20 transition hover:-translate-y-1 hover:bg-[#f6fff4]">{{ $slide->cta_label }}</a>
                </div>
            </div>
        </div>
    @endforeach
</section>

@if($notices->isNotEmpty())
<section class="bg-[#f4fbf2] py-4">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-3 px-4 text-sm sm:px-6 lg:px-8">
        <strong class="text-[#006b12]">Notices:</strong>
        @foreach($notices as $notice)
            <span class="rounded-full bg-white px-4 py-2 font-semibold text-[#12351d] shadow-sm ring-1 ring-green-900/10">{{ $notice->title }}</span>
        @endforeach
    </div>
</section>
@endif

<section class="py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
        <div class="fade-up rounded-2xl bg-gradient-to-br from-[#e8f5e9] to-white p-8 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            <img class="mx-auto max-h-96 w-full object-contain" src="{{ asset('images/college.png') }}" alt="Makeni College logo">
        </div>
        <div class="fade-up">
            <p class="text-sm font-bold uppercase tracking-[0.24em] text-[#006b12]">About the College</p>
            <h2 class="mt-3 text-3xl font-black tracking-normal text-[#12351d] md:text-4xl">Professional teacher education with a Zambian community focus.</h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">{{ $about->excerpt }}</p>
            <p class="mt-4 leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($about->body, 280) }}</p>
            <a class="mt-7 inline-flex rounded-full bg-[#006b12] px-6 py-3 text-sm font-black text-white shadow-lg shadow-green-900/20 transition hover:-translate-y-1 hover:bg-[#004b0d]" href="{{ route('about') }}">Read About Us</a>
        </div>
    </div>
</section>

<section id="programmes" class="bg-[#f7fbf6] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-section-heading eyebrow="Study With Us" title="Programmes at Makeni College" body="Teacher training and vocational skills pathways are managed through the CMS and prepared for admissions updates." />

        <div class="mt-12">
            <div class="mb-6 flex items-end justify-between gap-4">
                <h3 class="text-2xl font-black text-[#12351d]">Teacher Training</h3>
                <a class="hidden rounded-full border border-[#006b12] px-5 py-2 text-sm font-bold text-[#006b12] transition hover:bg-[#006b12] hover:text-white sm:inline-flex" href="{{ route('programmes') }}">View All</a>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                @foreach($teacherProgrammes as $programme)
                    <x-program-card :programme="$programme" />
                @endforeach
            </div>
        </div>

        <div class="mt-16">
            <h3 class="mb-6 text-2xl font-black text-[#12351d]">Vocational Training</h3>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($vocationalProgrammes as $programme)
                    <x-program-card :programme="$programme" />
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-section-heading eyebrow="Fees" title="Fees and Admissions Guidance" body="Official fees can change by intake. The CMS keeps the public fee guidance clear while admissions confirms current amounts." />
        <div class="mt-12">
            <x-fees-table :fees="$fees" />
        </div>
    </div>
</section>

<section class="bg-[#f7fbf6] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-section-heading eyebrow="Enrollment" title="Simple Enrollment Steps" body="A clear path from programme choice to confirmed registration." />
        <div class="mt-12">
            <x-enrollment-stepper :steps="$enrollmentSteps" />
        </div>
    </div>
</section>

<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-section-heading eyebrow="Campus Life" title="Gallery Preview" body="College images and categories are maintained from the CMS." />
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($gallery as $item)
                <article class="fade-up overflow-hidden rounded-2xl bg-white shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
                    <img class="h-64 w-full object-contain bg-[#f4fbf2] p-6" src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    <div class="p-5">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#006b12]">{{ $item->category }}</p>
                        <h3 class="mt-2 font-black text-[#12351d]">{{ $item->title }}</h3>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-[#f7fbf6] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-section-heading eyebrow="News" title="Latest College Updates" body="News posts are CMS-managed for admissions, academic notices, and college communication." />
        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @foreach($news as $post)
                <article class="fade-up rounded-2xl bg-white p-6 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10 transition hover:-translate-y-1 hover:shadow-[0_24px_60px_rgba(15,54,25,0.16)]">
                    <p class="text-sm font-bold text-[#006b12]">{{ optional($post->published_at)->format('d M Y') }}</p>
                    <h3 class="mt-3 text-xl font-black text-[#12351d]"><a href="{{ route('news.show', $post) }}">{{ $post->title }}</a></h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
        <div class="fade-up rounded-2xl bg-[#06320d] p-8 text-white shadow-[0_16px_40px_rgba(15,54,25,0.18)]">
            <p class="text-sm font-bold uppercase tracking-[0.24em] text-green-100">Contact</p>
            <h2 class="mt-3 text-3xl font-black">Speak with admissions</h2>
            <div class="mt-8 grid gap-4">
                <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10"><strong>Phone</strong><p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_phone', 'Call: +260 962 974 898') }}</p></div>
                <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10"><strong>Email</strong><p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_email', 'info@makenicollege.org') }}</p></div>
                @if($siteSettings->get('contact_email_2'))
                    <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10"><strong>Email 2</strong><p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_email_2') }}</p></div>
                @endif
                <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10"><strong>Address</strong><p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_address', 'P.O. Box No. 32531, Mosque Road, Makeni., Lusaka, Zambia.') }}</p></div>
            </div>
        </div>
        <div class="fade-up overflow-hidden rounded-[2rem] bg-[#e8f5e9] shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            <iframe
                class="h-96 w-full border-0"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ rawurlencode($siteSettings->get('map_coordinate', 'G7V4+JFC, Lusaka, Zambia')) }}&output=embed"
                title="Makeni College of Education map location">
            </iframe>
        </div>
    </div>
</section>
@endsection
