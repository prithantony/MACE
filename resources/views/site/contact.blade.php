@extends('layouts.site')

@section('content')
<section class="bg-[#f7fbf6] py-20">
    <x-section-heading eyebrow="Contact" title="Contact Us" body="Reach Makeni College of Education Zambia for admissions and general enquiries." />
</section>

<section class="py-20">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
        <div class="fade-up overflow-hidden rounded-[2rem] bg-[#06320d] text-white shadow-[0_16px_40px_rgba(15,54,25,0.18)]">
            <div class="relative h-72 overflow-hidden rounded-b-[3rem]">
                <img class="h-full w-full object-cover" src="{{ asset($siteSettings->get('contact_image', 'images/CardImages1.png')) }}" alt="Makeni College students">
                <div class="absolute inset-0 bg-gradient-to-t from-[#06320d]/70 to-transparent"></div>
            </div>
            <div class="p-8">
                <h3 class="text-2xl font-black">College Contacts</h3>
                <div class="mt-6 grid gap-4">
                    <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10">
                        <strong>Address</strong>
                        <p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_address', 'P.O. Box No. 32531, Mosque Road, Makeni., Lusaka, Zambia.') }}</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10">
                        <strong>Email</strong>
                        <p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_email', 'info@makenicollege.org') }}</p>
                        @if($siteSettings->get('contact_email_2'))
                            <p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_email_2') }}</p>
                        @endif
                    </div>
                    <div class="rounded-2xl bg-white/10 p-5 ring-1 ring-white/10">
                        <strong>Phone</strong>
                        <p class="mt-1 text-green-50/80">{{ $siteSettings->get('contact_phone', 'Call: +260 962 974 898') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="enquiry-form" class="fade-up scroll-mt-28 rounded-[2rem] bg-white p-8 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            <h3 class="text-2xl font-black text-[#12351d]">Enquiry Form</h3>
            <form class="mt-6 grid gap-4">
                <div class="grid gap-4 md:grid-cols-2">
                    <input class="rounded-2xl border border-green-900/10 px-4 py-4 outline-none transition focus:border-[#006b12] focus:ring-4 focus:ring-green-100" placeholder="Full name">
                    <input class="rounded-2xl border border-green-900/10 px-4 py-4 outline-none transition focus:border-[#006b12] focus:ring-4 focus:ring-green-100" placeholder="Email address">
                </div>
                <input class="rounded-2xl border border-green-900/10 px-4 py-4 outline-none transition focus:border-[#006b12] focus:ring-4 focus:ring-green-100" placeholder="Subject">
                <textarea class="min-h-40 rounded-2xl border border-green-900/10 px-4 py-4 outline-none transition focus:border-[#006b12] focus:ring-4 focus:ring-green-100" placeholder="Message"></textarea>
                <button type="button" class="rounded-full bg-[#006b12] px-6 py-4 text-sm font-black text-white shadow-lg shadow-green-900/20 transition hover:-translate-y-1 hover:bg-[#004b0d]">Send Enquiry</button>
            </form>

            <div class="mt-8 overflow-hidden rounded-[2rem] bg-[#e8f5e9] shadow-inner ring-1 ring-green-900/10">
                <iframe
                    class="h-80 w-full border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q={{ rawurlencode($siteSettings->get('map_coordinate', 'G7V4+JFC, Lusaka, Zambia')) }}&output=embed"
                    title="Makeni College of Education map location">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection
