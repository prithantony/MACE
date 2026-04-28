@extends('layouts.site')

@section('content')
<x-page-banner image="images/Gallery.png" href="#gallery-list" alt="Makeni College gallery banner" />
<section class="py-20">
    <div id="gallery-list" class="mx-auto max-w-7xl scroll-mt-28 px-4 sm:px-6 lg:px-8">
        @foreach($items->groupBy('category') as $category => $group)
        <h3 class="mb-6 text-2xl font-black text-[#12351d]">{{ $category ?: 'College Life' }}</h3>
        <div class="mb-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($group as $item)
                <article class="fade-up overflow-hidden rounded-2xl bg-white shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
                    <img class="h-64 w-full object-contain bg-[#f4fbf2] p-6" src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    <div class="p-5">
                        <h4 class="font-black text-[#12351d]">{{ $item->title }}</h4>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $item->caption }}</p>
                    </div>
                </article>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection
