@extends('layouts.site')

@section('content')
<section class="bg-[#f7fbf6] py-20">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <p class="text-sm font-bold text-[#006b12]">{{ optional($post->published_at)->format('d M Y') }}</p>
        <h1 class="mt-3 text-4xl font-black text-[#12351d] md:text-5xl">{{ $post->title }}</h1>
        <p class="mt-5 text-lg leading-8 text-slate-600">{{ $post->excerpt }}</p>
    </div>
</section>
<section class="py-20">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <article class="rounded-2xl bg-white p-8 text-lg leading-8 text-slate-700 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
            {!! nl2br(e($post->body)) !!}
        </article>
    </div>
</section>
@endsection
