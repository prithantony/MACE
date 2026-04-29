@extends('layouts.site')

@section('content')
<x-page-banner image="images/Department.png" href="#departments-list" alt="Makeni College academic departments banner" />
<section class="py-20">
    <div id="departments-list" class="mx-auto max-w-7xl scroll-mt-28 px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-2">
            @foreach($departments as $department)
                <article class="fade-up overflow-hidden rounded-2xl bg-white shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
                    <div class="h-4 bg-[#006b12]"></div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black text-[#12351d]">{{ $department->title }}</h3>
                        <p class="mt-3 leading-7 text-slate-600">{{ $department->description }}</p>
                        @if($department->programmes->isNotEmpty())
                        <h4 class="mt-6 font-black text-[#006b12]">Programmes</h4>
                        <ul class="mt-3 grid gap-2 text-slate-600">
                            @foreach($department->programmes as $programme)
                            <li class="rounded-xl bg-[#f7fbf6] px-4 py-3">{{ $programme->title }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="h-3 bg-[#f4c400]"></div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
