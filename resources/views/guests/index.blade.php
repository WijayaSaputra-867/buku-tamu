<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Daftar Buku Tamu
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <a href="{{ route('guests.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 dark:hover:bg-blue-500 transition">
                        Tambah Tamu
                    </a>
                    <a href="{{ route('guests.export') }}"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 dark:hover:bg-green-500 transition">
                        Export Excel
                    </a>
                </div>

                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr class="text-gray-700 dark:text-gray-200">
                            <th class="px-4 py-2 border dark:border-gray-700">#</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Nama</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Instansi</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Keperluan</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Check-in</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Check-out</th>
                            <th class="px-4 py-2 border dark:border-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                        @forelse ($guests as $guest)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $guest->name }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ $guest->institution->name }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">{{ Str::limit($guest->needed_field, 30) }}</td>
                                <td class="px-4 py-2 border dark:border-gray-700">
                                    {{ $guest->check_in_at ? $guest->check_in_at->format('Y-m-d H:i') : '-' }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-700">
                                    {{ $guest->check_out_at ? $guest->check_out_at->format('Y-m-d H:i') : '-' }}
                                </td>
                                <td class="px-4 py-2 border dark:border-gray-700 text-center">
                                    <a href="{{ route('guests.show', $guest->id) }}"
                                        class="text-blue-600 dark:text-blue-400 hover:underline">Detail</a>
                                    @if (!$guest->check_out_at)
                                        <form action="{{ route('guests.checkout', $guest->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="text-red-600 dark:text-red-400 hover:underline ms-2">
                                                Checkout
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada tamu yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4 text-gray-700 dark:text-gray-300">
                    {{ $guests->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
