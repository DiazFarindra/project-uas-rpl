<div style="min-height: 716px" class="w-64 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
    <div class="px-8">
        <div class="h-16 w-full flex items-center">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-slate-200 mr-2">
                    {{ auth()->user()->type->value }}
                </h1>
            </div>
        </div>
        <ul class="mt-6">
            <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                <a href="{{ route(auth()->user()->type->value.'.dashboard') }}" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                    <span class="text-sm ml-2">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->type === \App\Enums\UserType::ADMIN)
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="{{ route('admin.accounts.index') }}" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="text-sm ml-2">Management Akun</span>
                    </a>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="{{ route('admin.schedules.index') }}" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="text-sm ml-2">Management Jadwal</span>
                    </a>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="{{ route('admin.informations.index') }}" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="text-sm ml-2">Management Informasi</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->type === \App\Enums\UserType::STUDENT)
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="{{ route('student.reports.index') }}" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="text-sm ml-2">Laporan</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->type !== \App\Enums\UserType::ADMIN)
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="{{ route('contact-admin') }}" target="_blank" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="text-sm ml-2">Kontak Admin</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
