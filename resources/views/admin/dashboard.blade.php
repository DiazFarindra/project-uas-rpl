@extends('layouts.app')

@section('content')
<div class="container mx-auto h-64 md:w-4/5 w-11/12 px-6">
    <div class="w-full h-full">
        <div class="h-screen w-full flex flex-col items-center mt-8">
            <div class="max-w-7xl mx-auto mb-18">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-dark text-center">
                    Statistics
                </h2>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-4">
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Mahasiswa Aktif
                                </dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                    {{ $students }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Dosen Aktif
                                </dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                    {{ $teachers }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total Bimbingan</dt>
                                <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $schedules }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
