@extends('layouts.site')

@section('content')
<section class="bg-[#f7fbf6] py-20">
    <div class="mx-auto max-w-lg px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border-t-8 border-[#006b12] bg-white p-8 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            <div class="text-center">
                <img class="mx-auto h-24 w-24 object-contain" src="{{ asset($siteSettings->get('site_logo', 'images/college.png')) }}" alt="MACE logo">
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
                    <a class="font-bold text-[#006b12]" href="#">Forgot Password?</a>
                </div>
                <button type="button" class="rounded-full bg-[#006b12] px-6 py-4 text-sm font-black text-white shadow-lg shadow-green-900/20 transition hover:-translate-y-1 hover:bg-[#004b0d]">Sign In</button>
            </form>
        </div>
    </div>
</section>
@endsection
