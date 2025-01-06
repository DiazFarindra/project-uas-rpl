@extends('layouts.app')

@section('content')
<div class="card bg-white w-full">
    <!-- Header -->
    <div class="card-header bg-blue-500 text-white p-4 flex justify-between items-center">
        <h3 class="card-title text-lg font-semibold">Management Laporan Mahasiswa</h3>
    </div>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Body -->
    <div class="card-body p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Tambah Laporan Mahasiswa</h1>
        <form action="{{ route('student.reports.store') }}" method="post" class="grid grid-cols-1 gap-4">
            @csrf

            <div class="flex flex-col space-y-2">
                <label for="title" class="text-gray-600">Judul</label>
                <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}">
                @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="content" class="text-gray-600">Deskripsi</label>
                <textarea name="content" id="content" class="form-textarea">{{ old('content') }}</textarea>
                @error('content')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-flex items-center">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
