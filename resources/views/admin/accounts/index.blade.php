@extends('layouts.app')

@section('content')
<div class="card bg-white shadow-md w-full">
    <!-- Header -->
    <div class="card-header bg-blue-500 text-white p-4 flex justify-between items-center">
        <h3 class="card-title text-lg font-semibold">Management Akun</h3>
        <div class="card-tools flex space-x-2">
            <button type="button" class="btn btn-tool text-white" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool text-white" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg my-4 mx-5">
        {{ session('success') }}
    </div>
    @endif

    <!-- Body -->
    <div class="card-body p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Management Akun</h1>
        <a href="{{ route('admin.accounts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-flex items-center">
            Tambah
        </a>

        <!-- Table -->
        <div class="overflow-x-auto mt-6">
            <table class=" w-full border-collapse border border-gray-200 shadow-sm rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Nama</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">NIM</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-left font-semibold text-gray-600">Role</th>
                        <th class="border border-gray-300 px-4 py-2 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accounts as $account)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $account->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $account->nim }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $account->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $account->type }}</td>
                        @if($account->type !== \App\Enums\UserType::ADMIN)
                        <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                            <a href="{{ route('admin.accounts.edit', $account->id) }}" class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md flex items-center">
                                edit
                            </a>
                            <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md flex items-center">
                                    delete
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center" colspan="6">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
