<x-guest-layout>
    <div style="
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('{{ asset('backbround1.png') }}');
        background-size: cover;
        background-position: center;
    ">
        <div style="
            background-color: rgba(0, 0, 0, 0.65);
            padding: 2rem;
            border-radius: 12px;
            width: 420px;
            color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        ">
            {{-- Logo --}}
            <div style="text-align: center; margin-bottom: 1rem;">
                <img src="{{ asset('logo.png') }}" alt="TechRent" style="height: 50px;">
            </div>

            {{-- Validation Errors --}}
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mt-4">
                    <label for="email" style="display: block; margin-bottom: 4px;">El. paštas</label>
                    <input id="email" class="block w-full rounded px-4 py-2 bg-[#1f1f1f] text-white border-none focus:ring-2 focus:ring-yellow-400"
                           type="email" name="email" :value="old('email')" required autofocus />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <label for="password" style="display: block; margin-bottom: 4px;">Slaptažodis</label>
                    <input id="password" class="block w-full rounded px-4 py-2 bg-[#1f1f1f] text-white border-none focus:ring-2 focus:ring-yellow-400"
                           type="password" name="password" required autocomplete="current-password" />
                </div>

                {{-- Remember Me --}}
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-yellow-500 shadow-sm focus:ring-yellow-300" name="remember">
                        <span class="ml-2 text-sm text-white">Atsiminti mane</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-yellow-400 hover:text-yellow-500" href="{{ route('password.request') }}">
                            Pamiršai slaptažodį?
                        </a>
                    @endif

                    <button type="submit"
                            style="background-color: #FAED26; color: black; padding: 8px 16px; font-weight: bold; border-radius: 6px;">
                        Prisijungti
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
