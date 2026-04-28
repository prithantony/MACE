<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->seo_title ?? $post->title ?? $siteSettings->get('seo_title', 'Makeni College of Education Zambia') }}</title>
    <meta name="description" content="{{ $page->meta_description ?? $siteSettings->get('seo_meta_description', 'Makeni College of Education Zambia official website') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="bg-[#06320d] text-sm text-white">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-2 px-4 py-2 sm:px-6 lg:px-8">
            <span>{{ $siteSettings->get('contact_phone', 'Call: +260 962 974 898') }}</span>
            <span>{{ $siteSettings->get('contact_email', 'info@makenicollege.org') }} @if($siteSettings->get('contact_email_2')) / {{ $siteSettings->get('contact_email_2') }} @endif</span>
        </div>
    </div>

    <header class="sticky top-0 z-50 border-b border-green-900/10 bg-white/95 shadow-sm backdrop-blur">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
                <img class="h-14 w-14 shrink-0 rounded-2xl bg-white object-contain ring-1 ring-green-900/10" src="{{ asset($siteSettings->get('site_logo', 'images/college.png')) }}" alt="Makeni College logo">
                <span class="text-base font-black leading-tight text-[#12351d] sm:text-lg">Makeni College of Education</span>
            </a>
            <button class="rounded-xl border border-green-900/10 px-3 py-2 text-sm font-bold text-[#12351d] lg:hidden" type="button" data-mobile-menu>
                Menu
            </button>
            <div class="hidden items-center gap-7 lg:flex">
                <a class="font-bold text-[#12351d] transition hover:text-[#006b12]" href="{{ route('home') }}">Home</a>
                <a class="font-bold text-[#12351d] transition hover:text-[#006b12]" href="{{ route('about') }}">About Us</a>
                <a class="font-bold text-[#12351d] transition hover:text-[#006b12]" href="{{ route('departments') }}">Departments</a>
                <a class="font-bold text-[#12351d] transition hover:text-[#006b12]" href="{{ route('gallery') }}">Gallery</a>
                <a class="font-bold text-[#12351d] transition hover:text-[#006b12]" href="{{ route('news') }}">Latest News</a>
                <div class="group relative">
                    <button class="font-bold text-[#12351d] transition hover:text-[#006b12]">Login</button>
                    <div class="invisible absolute right-0 top-full w-56 translate-y-3 rounded-2xl bg-white p-2 opacity-0 shadow-2xl ring-1 ring-green-900/10 transition group-hover:visible group-hover:translate-y-2 group-hover:opacity-100">
                        @forelse($sitePortalLinks as $portalLink)
                            <a class="block rounded-xl px-4 py-3 text-sm font-bold text-[#12351d] transition hover:bg-[#e8f5e9] hover:text-[#006b12]" href="{{ $portalLink->url }}">{{ $portalLink->label }}</a>
                        @empty
                            <a class="block rounded-xl px-4 py-3 text-sm font-bold text-[#12351d] transition hover:bg-[#e8f5e9]" href="{{ route('portal.staff') }}">Staff Portal</a>
                            <a class="block rounded-xl px-4 py-3 text-sm font-bold text-[#12351d] transition hover:bg-[#e8f5e9]" href="{{ route('portal.student') }}">Student Portal</a>
                            <a class="block rounded-xl px-4 py-3 text-sm font-bold text-[#12351d] transition hover:bg-[#e8f5e9]" href="{{ route('portal.lms') }}">LMS Portal</a>
                            <a class="block rounded-xl px-4 py-3 text-sm font-bold text-[#12351d] transition hover:bg-[#e8f5e9]" href="{{ route('portal.exam') }}">Exam Portal</a>
                        @endforelse
                    </div>
                </div>
                <a class="rounded-full bg-[#006b12] px-5 py-3 text-sm font-black text-white shadow-lg shadow-green-900/20 transition hover:-translate-y-0.5 hover:bg-[#004b0d]" href="{{ route('contact') }}#enquiry-form">Apply Now</a>
            </div>
        </nav>
        <div class="hidden border-t border-green-900/10 bg-white px-4 py-4 lg:hidden" data-mobile-panel>
            <div class="mx-auto grid max-w-7xl gap-3">
                <a class="font-bold text-[#12351d]" href="{{ route('home') }}">Home</a>
                <a class="font-bold text-[#12351d]" href="{{ route('about') }}">About Us</a>
                <a class="font-bold text-[#12351d]" href="{{ route('departments') }}">Departments</a>
                <a class="font-bold text-[#12351d]" href="{{ route('gallery') }}">Gallery</a>
                <a class="font-bold text-[#12351d]" href="{{ route('news') }}">Latest News</a>
                <a class="font-bold text-[#006b12]" href="{{ route('contact') }}#enquiry-form">Apply Now</a>
            </div>
        </div>
    </header>

    <main>@yield('content')</main>

    <a href="https://wa.me/{{ preg_replace('/\D+/', '', $siteSettings->get('whatsapp_number', '260962974898')) }}?text={{ rawurlencode('Hello Makeni College of Education, I would like to make an enquiry.') }}" target="_blank" rel="noopener" aria-label="Chat on WhatsApp" class="fixed bottom-24 right-5 z-50 grid h-14 w-14 place-items-center rounded-full bg-[#25D366] text-white shadow-2xl shadow-green-900/30 transition hover:-translate-y-1">
        <svg class="h-7 w-7" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
            <path d="M16.02 3.2A12.72 12.72 0 0 0 5.1 22.45L3.6 28.8l6.5-1.46A12.73 12.73 0 1 0 16.02 3.2Zm0 2.43a10.3 10.3 0 1 1-5.25 19.16l-.38-.23-3.05.69.71-2.98-.25-.4A10.3 10.3 0 0 1 16.02 5.63Zm-4.3 4.96c-.22 0-.58.08-.88.4-.3.33-1.16 1.13-1.16 2.77 0 1.64 1.19 3.22 1.36 3.44.17.22 2.3 3.7 5.68 5.04 2.81 1.11 3.39.89 4 .83.61-.06 1.98-.81 2.26-1.6.28-.78.28-1.45.2-1.6-.09-.14-.31-.22-.65-.39-.33-.17-1.98-.98-2.29-1.09-.31-.11-.53-.17-.75.17-.22.33-.86 1.08-1.06 1.3-.19.22-.39.25-.72.08-.33-.17-1.41-.52-2.69-1.66-1-.89-1.67-1.99-1.86-2.32-.2-.33-.02-.51.15-.68.15-.15.33-.39.5-.58.17-.2.22-.34.33-.56.11-.22.06-.42-.03-.58-.08-.17-.75-1.82-1.03-2.49-.27-.65-.55-.56-.75-.57h-.61Z"/>
        </svg>
    </a>
    <a href="{{ route('contact') }}#enquiry-form" class="fixed bottom-5 right-5 z-50 rounded-full bg-[#006b12] px-5 py-4 text-sm font-black text-white shadow-2xl shadow-green-900/30 transition hover:-translate-y-1 hover:bg-[#004b0d]">
        Apply Now
    </a>

    <footer class="bg-[#06280d] py-14 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 md:grid-cols-3">
                <div>
                    <div class="flex items-center gap-3">
                        <img class="h-14 w-14 rounded-2xl bg-white object-contain p-1" src="{{ asset($siteSettings->get('site_logo', 'images/college.png')) }}" alt="Makeni College logo">
                        <strong>Makeni College of Education</strong>
                    </div>
                    <p class="mt-4 max-w-md text-sm leading-7 text-green-50/80">{{ $siteSettings->get('footer_about', 'A professional teacher education college committed to preparing competent educators for Zambia and beyond.') }}</p>
                </div>
                <div>
                    <h3 class="font-black">Quick Links</h3>
                    <div class="mt-4 grid gap-3 text-sm text-green-50/80">
                        <a class="hover:text-white" href="{{ route('programmes') }}">Programmes</a>
                        <a class="hover:text-white" href="{{ route('departments') }}">Departments</a>
                        <a class="hover:text-white" href="{{ route('news') }}">Latest News</a>
                        <a class="hover:text-white" href="{{ route('contact') }}">Contact Us</a>
                    </div>
                </div>
                <div>
                    <h3 class="font-black">Contact</h3>
                    <div class="mt-4 grid gap-2 text-sm text-green-50/80">
                        <span>{{ $siteSettings->get('contact_address', 'P.O. Box No. 32531, Mosque Road, Makeni., Lusaka, Zambia.') }}</span>
                        <span>{{ $siteSettings->get('contact_email', 'info@makenicollege.org') }}</span>
                        @if($siteSettings->get('contact_email_2'))<span>{{ $siteSettings->get('contact_email_2') }}</span>@endif
                        <span>{{ $siteSettings->get('contact_phone', 'Call: +260 962 974 898') }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-10 flex flex-wrap justify-between gap-3 border-t border-white/10 pt-6 text-sm text-green-50/70">
                <span>&copy; {{ date('Y') }} Makeni College of Education Zambia.</span>
                <a class="hover:text-white" href="{{ route('admin.dashboard') }}">CMS Admin</a>
            </div>
        </div>
    </footer>
</body>
</html>
