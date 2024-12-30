<x-log title="Sign Up" action="{{ route('signup') }}" buttonText="Sign Up">
    <label class="font-semibold text-sm text-gray-600 pb-1 block">Username</label>
    <input name="name" type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" required />

    <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
    <input name="email" type="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" required />

    <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
    <input name="password" type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" required />

    <label class="font-semibold text-sm text-gray-600 pb-1 block">Confirm Password</label>
    <input name="password_confirmation" type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" required />

    {{-- Tampilkan pesan error atau notifikasi di bawah form --}}
    @if ($errors->any())
        <div class="mt-2 text-red-600 px-4 py-2 rounded">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="mt-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif
</x-log>
