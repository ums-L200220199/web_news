<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="grid place-items-center mx-auto max-w-sm px-4 py-4 sm:px-6 lg:px-8 relative border rounded-lg transition-transform duration-300 hover:scale-105 mt-6">
        <img class="inline-block size-40 rounded-full ring-3 ring-white mt-4" src="{{ asset('images/avatar.png') }}" alt="Avatar">
        <p class="mt-2 text-left text-lg font-semibold text-gray-800">
            Nama : Dicky Ramadhan <br>
            Nim  : L200220199
        </p>
    </div>
    
</x-layout>