@extends('layouts.app')

@section('content')
<div class="container mx-auto h-64 md:w-4/5 w-11/12 px-6">
    <div class="w-full h-full">
        <div class="mt-8">
            <div class="max-w-7xl mx-auto mb-18">
                <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">
                    Statistics
                </h2>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-4">
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total Bimbingan (pending)</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $schedulesStats->pending }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total Bimbingan (terlewat)</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $schedulesStats->overdue }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total Bimbingan (selesai)</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $schedulesStats->completed }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">total Bimbingan minggu ini</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $schedulesPending }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border rounded w-full mt-5">
                <div class="card-body p-6">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Jadwal</h1>

                    <!-- Table -->
                    <div class="overflow-x-auto mt-6">
                        <table class=" w-full border-collapse border border-gray-200 shadow-sm rounded-md">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">No</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Dosen/Pembimbing</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Mahasiswa</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Tanggal</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Jam</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Judul</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules as $schedule)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $schedule->teacher->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $schedule->student->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($schedule->date_time)->format('d F Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($schedule->date_time)->format('H:i') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $schedule->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                                        <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md flex items-center">
                                            edit
                                        </a>
                                        <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md flex items-center">
                                                delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center" colspan="7">Data tidak ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
