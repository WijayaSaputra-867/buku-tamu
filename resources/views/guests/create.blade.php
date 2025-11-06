<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Check-In Tamu') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('guests.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" required>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Kelamin</label>
                        <select name="gender" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih --</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>

                    <!-- Instansi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instansi / Asal</label>
                        <select name="institution_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                            <option value="">-- Pilih Instansi --</option>
                            @foreach($institutions as $institution)
                                <option value="{{ $institution->id }}">{{ $institution->name . "|" . $institution->division }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                        <input type="text" name="phone" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" placeholder="Contoh: +628123456789">
                    </div>

                    <!-- Keperluan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keperluan</label>
                        <textarea name="needed_field" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" required></textarea>
                    </div>

                    <!-- Bertemu Dengan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bertemu dengan</label>
                        <input type="text" name="meeting_person" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    </div>

                    <!-- Upload Foto -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto (Opsional)</label>
                        <input type="file" name="photo" accept="image/*" class="mt-1 block w-full text-gray-700 dark:text-gray-200 dark:bg-gray-900 dark:border-gray-700">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-md transition">
                            Simpan & Check-in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
