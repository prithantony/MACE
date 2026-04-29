@props(['programme'])

<article class="fade-up group flex h-full flex-col overflow-hidden rounded-[1.5rem] bg-white shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10 transition duration-300 hover:-translate-y-2 hover:shadow-[0_24px_60px_rgba(15,54,25,0.18)]">
    <div class="relative h-56 overflow-hidden bg-[#e8f5e9] sm:h-60 lg:h-64">
        <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset($programme->image ?: 'images/college.png') }}" alt="{{ $programme->title }}">
        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-[#06320d]/18 to-transparent"></div>
        <span class="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1 text-xs font-bold uppercase tracking-wide text-[#006b12] shadow-md ring-1 ring-green-900/10">{{ $programme->duration }}</span>
    </div>
    <div class="flex flex-1 flex-col p-6">
        <p class="text-sm font-bold text-[#c9a227]">{{ $programme->level }}</p>
        <h3 class="mt-2 text-xl font-black text-[#12351d]">{{ $programme->title }}</h3>
        <p class="mt-3 flex-1 text-sm leading-6 text-slate-600">{{ $programme->description }}</p>
        <a href="{{ route('contact') }}#enquiry-form" class="mt-6 inline-flex items-center justify-center rounded-full border border-[#006b12] px-5 py-3 text-sm font-bold text-[#006b12] transition group-hover:bg-[#006b12] group-hover:text-white">
            Apply Now
        </a>
    </div>
</article>
