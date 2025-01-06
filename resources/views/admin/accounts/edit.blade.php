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
        <form action="{{ route('admin.accounts.update', $account->id) }}" method="post" class="grid grid-cols-1 gap-4">
            @csrf
            @method('put')

            <div class="flex flex-col space-y-2">
                <label for="name" class="text-gray-600">Nama</label>
                <input type="text" name="name" id="name" class="form-input" value="{{ $account->name ?? old('name') }}">
                @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="nim" class="text-gray-600">NIM (hanya untuk mahasiswa)</label>
                <input type="number" name="nim" id="nim" class="form-input" value="{{ $account->nim ?? old('nim') }}">
                @error('nim')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="email" class="text-gray-600">Email</label>
                <input type="email" name="email" id="email" class="form-input" value="{{ $account->email ?? old('email') }}">
                @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="password" class="text-gray-600">Password</label>
                <input type="password" name="password" id="password" class="form-input">
                @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="password_confirmation" class="text-gray-600">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
                @error('password_confirmation')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="type" class="text-gray-600">Role</label>
                <select name="type" id="type" class="form-select">
                    <option selected disabled>Pilih Role</option>
                    <option {{ \App\Enums\UserType::ADMIN === $account->type ? 'selected' : '' }} value="{{ \App\Enums\UserType::ADMIN->value }}">Admin</option>
                    <option {{ \App\Enums\UserType::STUDENT === $account->type ? 'selected' : '' }} value="{{ \App\Enums\UserType::STUDENT->value }}">Mahasiswa</option>
                    <option {{ \App\Enums\UserType::TEACHER === $account->type ? 'selected' : '' }} value="{{ \App\Enums\UserType::TEACHER->value }}">Dosen/Pembimbing</option>
                </select>
                @error('type')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-flex items-center">
                    Edit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
