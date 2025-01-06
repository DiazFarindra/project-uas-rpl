@extends('layouts.app')

@section('content')
<div class="card bg-white shadow-md w-full">
    <!-- Header -->
    <div class="card-header bg-blue-500 text-white p-4 flex justify-between items-center">
        <h3 class="card-title text-lg font-semibold">Management Laporan Mahasiswa</h3>
    </div>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg my-4 mx-5">
        {{ session('success') }}
    </div>
    @endif

    <!-- Body -->
    <div class="card-body p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Management Laporan Mahasiswa</h1>

        <a href="{{ route('student.reports.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-flex items-center">
            Tambah
        </a>

        <!-- Table -->
        <div class="overflow-x-auto mt-6">
            <table class=" w-full border-collapse border border-gray-200 shadow-sm rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Mahasiswa</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Judul</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $report->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $report->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $report->content }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                            <a href="{{ route('student.reports.edit', $report->id) }}" class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md flex items-center">
                                edit
                            </a>
                            <form action="{{ route('student.reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
@endsection
