@props(['eyebrow' => null, 'title', 'body' => null])

<div {{ $attributes->merge(['class' => 'fade-up mx-auto max-w-3xl text-center']) }}>
    @if($eyebrow)
        <p class="mb-3 text-sm font-bold uppercase tracking-[0.24em] text-[#006b12]">{{ $eyebrow }}</p>
    @endif
    <h2 class="text-3xl font-black tracking-normal text-[#12351d] md:text-4xl">{{ $title }}</h2>
    @if($body)
        <p class="mt-4 text-base leading-7 text-slate-600 md:text-lg">{{ $body }}</p>
    @endif
</div>
