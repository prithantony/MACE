@props(['image', 'href' => null])

@php($target = $href ?: request()->url())

<section class="bg-white py-8 sm:py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <a href="{{ $target }}" class="group block overflow-hidden rounded-[2rem] shadow-[0_18px_54px_rgba(15,54,25,0.12)] ring-1 ring-green-900/10">
            <img class="aspect-[16/6] w-full object-cover transition duration-500 group-hover:scale-[1.015] sm:aspect-[16/5]" src="{{ asset($image) }}" alt="{{ $attributes->get('alt', 'Makeni College banner') }}">
        </a>
    </div>
</section>
