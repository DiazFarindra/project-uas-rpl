@php
    $informations = \App\Models\Information::query()
        ->when(auth()->user()->type !== \App\Enums\UserType::ADMIN, function ($query) {
            return $query->where('user_id', auth()->id())
                ->orWhere('user_id', null);
        })
        ->latest()
        ->get();
@endphp

<div class="bg-white w-80 p-6 border border-gray-200">
    <!-- Title -->
    <h1 class="text-lg font-bold text-black mb-4">Notifikasi Terbaru</h1>

    @forelse($informations as $information)
    <div class="mb-4">
        <h2 class="text-sm font-semibold text-black">{{ $information->title }}</h2>
        <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($information->created_at)->diffForHumans() }}</p>
        <hr class="mt-2 border-gray-300">
    </div>
    @empty
    <p class="text-gray-500">Tidak ada notifikasi terbaru</p>
    @endforelse
</div>
