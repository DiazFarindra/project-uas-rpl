@extends('layouts.app')

@section('content')
<div class="card bg-white w-full">
    <!-- Header -->
    <div class="card-header bg-blue-500 text-white p-4 flex justify-between items-center">
        <h3 class="card-title text-lg font-semibold">Management Akun</h3>
    </div>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Body -->
    <div class="card-body p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Tambah Akun</h1>
        <form action="{{ route('admin.schedules.store') }}" method="post" class="grid grid-cols-1 gap-4">
            @csrf

            <div class="flex flex-col space-y-2">
                <label for="teacher_id" class="text-gray-600">Dosen/Pembimbing</label>
                <select name="teacher_id" id="teacher_id" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    <option selected disabled>Pilih Dosen/Pembimbing</option>
                    @forelse ($teachers as $teacher)
                    <option {{ old('teacher_id') == $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @empty
                    <option selected disabled>Tidak ada data</option>
                    @endforelse
                </select>
                @error('teacher_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="student_id" class="text-gray-600">Mahasiswa</label>
                <select name="student_id" id="student_id" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    <option selected disabled>Pilih Mahasiswa</option>
                    @forelse ($students as $student)
                    <option {{ old('student_id') == $student->id ? 'selected' : '' }} value="{{ $student->id }}">{{ $student->name }}</option>
                    @empty
                    <option selected disabled>Tidak ada data</option>
                    @endforelse
                </select>
                @error('student_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="date_time" class="text-gray-600">Jam & Tanggal</label>
                <input type="datetime-local" name="date_time" id="date_time" class="form-input" value="{{ old('date_time') }}">
                @error('date_time')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="title" class="text-gray-600">Judul</label>
                <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}">
                @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="description" class="text-gray-600">Deskripsi</label>
                <textarea name="description" id="description" class="form-textarea">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="status" class="text-gray-600">Status</label>
                <select name="status" id="status" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    <option selected disabled>Pilih Status</option>
                    <option {{ old('status') == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                    <option {{ old('status') == 'approved' ? 'selected' : '' }} value="approved">Approved</option>
                    <option {{ old('status') == 'overdue' ? 'selected' : '' }} value="overdue">Overdue</option>
                </select>
                @error('status')
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
