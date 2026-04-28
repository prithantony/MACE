@props(['steps'])

<div class="fade-up relative">
    <div class="absolute left-8 top-0 hidden h-1 w-[calc(100%-4rem)] rounded-full bg-green-100 md:block"></div>
    <div class="absolute left-8 top-0 hidden h-1 w-[75%] rounded-full bg-[#006b12] md:block"></div>
    <div class="grid gap-5 md:grid-cols-4">
        @foreach($steps as $step)
            <div class="relative rounded-2xl bg-white p-6 shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
                <div class="mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-[#006b12] text-lg font-black text-white shadow-lg shadow-green-900/20">{{ $step->icon ?: str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                <h3 class="text-lg font-black text-[#12351d]">{{ $step->title }}</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $step->description }}</p>
            </div>
        @endforeach
    </div>
</div>
