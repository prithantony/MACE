@props(['fees'])

<div class="fade-up overflow-hidden rounded-2xl bg-white shadow-[0_16px_40px_rgba(15,54,25,0.10)] ring-1 ring-green-900/10">
    <div class="hidden md:block">
        <table class="w-full text-left">
            <thead class="bg-[#06320d] text-white">
                <tr>
                    <th class="px-6 py-4 text-sm font-bold">Fee Item</th>
                    <th class="px-6 py-4 text-sm font-bold">Programme Group</th>
                    <th class="px-6 py-4 text-sm font-bold">Amount</th>
                    <th class="px-6 py-4 text-sm font-bold">Frequency</th>
                    <th class="px-6 py-4 text-sm font-bold">Note</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-green-900/10">
                @foreach($fees as $fee)
                    <tr class="{{ $fee->is_highlighted ? 'bg-[#f0f8ee]' : 'bg-white' }}">
                        <td class="px-6 py-5 font-bold text-[#12351d]">{{ $fee->title }}</td>
                        <td class="px-6 py-5 text-slate-600">{{ $fee->programme_group }}</td>
                        <td class="px-6 py-5 font-bold text-[#006b12]">{{ $fee->amount }}</td>
                        <td class="px-6 py-5 text-slate-600">{{ $fee->frequency }}</td>
                        <td class="px-6 py-5 text-sm text-slate-600">{{ $fee->note }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="divide-y divide-green-900/10 md:hidden">
        @foreach($fees as $fee)
            <div class="{{ $fee->is_highlighted ? 'bg-[#f0f8ee]' : 'bg-white' }} p-5">
                <div class="flex items-start justify-between gap-4">
                    <h3 class="font-black text-[#12351d]">{{ $fee->title }}</h3>
                    <span class="rounded-full bg-[#006b12] px-3 py-1 text-xs font-bold text-white">{{ $fee->frequency }}</span>
                </div>
                <p class="mt-2 text-sm text-slate-600">{{ $fee->programme_group }}</p>
                <p class="mt-3 text-lg font-black text-[#006b12]">{{ $fee->amount }}</p>
                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $fee->note }}</p>
            </div>
        @endforeach
    </div>
</div>
