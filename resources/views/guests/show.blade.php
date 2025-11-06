<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Detail Tamu
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <!-- Foto Profil -->
                <div class="flex justify-center mb-6">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-200 dark:border-gray-700">
                        <img
                            src="{{ $guest->photo ? asset('storage/' . $guest->photo) : asset('img/default.png') }}"
                            alt="Foto {{ $guest->name }}"
                            class="w-full h-full object-cover"
                            onerror="this.src='{{ asset('img/default.png') }}'"
                        >
                    </div>
                </div>

                <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="py-3 flex justify-between">
                        <dt class="text-gray-600 dark:text-gray-400">Nama</dt>
                        <dd class="text-gray-900 dark:text-gray-100 font-medium">{{ $guest->name }}</dd>
                    </div>
                    <div class="py-3 flex justify-between">
                        <dt class="text-gray-600 dark:text-gray-400">Instansi</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $guest->institution->name }}</dd>
                    </div>
                    <div class="py-3 flex justify-between">
                        <dt class="text-gray-600 dark:text-gray-400">Keperluan</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $guest->needed_field }}</dd>
                    </div>
                    <div class="py-3 flex justify-between">
                        <dt class="text-gray-600 dark:text-gray-400">Bertemu dengan</dt>
                        <dd class="text-gray-900 dark:text-gray-100">{{ $guest->meeting_person }}</dd>
                    </div>
                    <div class="py-3 flex justify-between">
                        <dt class="text-gray-600 dark:text-gray-400">Waktu Check-in</dt>
                        <dd class="text-gray-900 dark:text-gray-100">
                            {{ $guest->check_in_at ? $guest->check_in_at->format('d/m/Y H:i') : '-' }}
                        </dd>
                    </div>
                    <div class="py-3 flex justify-between">
                        <dt class="text-gray-600 dark:text-gray-400">Waktu Check-out</dt>
                        <dd class="text-gray-900 dark:text-gray-100">
                            {{ $guest->check_out_at ? $guest->check_out_at->format('d/m/Y H:i') : '-' }}
                        </dd>
                    </div>
                </dl>

                <div class="mt-6 flex justify-between items-center">
                    <a href="{{ route('guests.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                        ← Kembali
                    </a>

                    @if (!$guest->check_out_at)
                        <form action="{{ route('guests.checkout', $guest->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-600 text-white rounded-md transition">
                                Check-out
                            </button>
                        </form>
                    @else
                        <span class="text-gray-500 dark:text-gray-400 italic">
                            Tamu sudah melakukan check-out.
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
