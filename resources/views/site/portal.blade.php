@extends('layouts.site')

@section('content')
<section class="bg-[#f7fbf6] py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-8 px-4 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
        <div class="fade-up overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_54px_rgba(15,54,25,0.12)] ring-1 ring-green-900/10">
            <div class="h-4 bg-[#006b12] sm:h-5"></div>
            <img class="h-auto w-full" src="{{ asset($portalImage) }}" alt="{{ $settingTitle ?: $title }} banner">
            <div class="h-3 bg-[#f4c400] sm:h-4"></div>
        </div>

        <div class="fade-up overflow-hidden rounded-[2rem] bg-white shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            <div class="h-4 bg-[#006b12]"></div>
            <div class="p-8">
                <div class="text-center">
                    <img class="mx-auto h-24 w-24 object-contain" src="{{ asset($siteSettings->get('site_logo', 'images/college.png')) }}" alt="Makeni College logo">
                    <h1 class="mt-5 text-3xl font-black text-[#12351d]">{{ $settingTitle ?: $title }}</h1>
                    <p class="mt-2 text-slate-600">Makeni College of Education Zambia</p>
                </div>
                <form class="mt-8 grid gap-5">
                    <div>
                        <label class="font-bold text-[#12351d]">Username or email</label>
                        <input type="email" class="mt-2 w-full rounded-2xl border border-green-900/10 px-4 py-4 outline-none transition focus:border-[#006b12] focus:ring-4 focus:ring-green-100" placeholder="name@example.com">
                    </div>
                    <div>
                        <label class="font-bold text-[#12351d]">Password</label>
                        <input type="password" class="mt-2 w-full rounded-2xl border border-green-900/10 px-4 py-4 outline-none transition focus:border-[#006b12] focus:ring-4 focus:ring-green-100" placeholder="Password">
                    </div>
                    <div class="flex justify-end">
                        <a class="font-bold text-[#006b12] transition hover:text-[#004b0d]" href="#">Forgot Password?</a>
                    </div>
                    <button type="button" class="rounded-full bg-[#006b12] px-6 py-4 text-sm font-black text-white shadow-lg shadow-green-900/20 transition hover:-translate-y-1 hover:bg-[#004b0d]">Sign In</button>
                </form>
            </div>
            <div class="h-3 bg-[#f4c400]"></div>
        </div>
    </div>
</section>
@endsection
