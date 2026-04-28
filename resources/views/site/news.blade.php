@extends('layouts.site')

@section('content')
<x-page-banner image="images/Latest_News.png" href="#news-list" alt="Makeni College latest news banner" />
<section class="py-20">
    <div id="news-list" class="mx-auto max-w-7xl scroll-mt-28 px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <article class="fade-up rounded-2xl bg-white p-6 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
                    <p class="text-sm font-bold text-[#006b12]">{{ optional($post->published_at)->format('d M Y') }}</p>
                    <h3 class="mt-3 text-xl font-black text-[#12351d]"><a href="{{ route('news.show', $post) }}">{{ $post->title }}</a></h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $post->excerpt }}</p>
                </article>
            @endforeach
        </div>
        <div class="mt-10">{{ $posts->links() }}</div>
    </div>
</section>
@endsection
