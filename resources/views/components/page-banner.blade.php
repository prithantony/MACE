@props(['image', 'href' => null])

@php($target = $href ?: request()->url())

<section class="bg-white py-8 sm:py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <a href="{{ $target }}" class="group block overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_54px_rgba(15,54,25,0.12)] ring-1 ring-green-900/10">
            <div class="h-4 bg-[#006b12] sm:h-5"></div>
            <img class="h-auto w-full transition duration-500 group-hover:scale-[1.01]" src="{{ asset($image) }}" alt="{{ $attributes->get('alt', 'Makeni College banner') }}">
            <div class="h-3 bg-[#f4c400] sm:h-4"></div>
        </a>
    </div>
</section>
