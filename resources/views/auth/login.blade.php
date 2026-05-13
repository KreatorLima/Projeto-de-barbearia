<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#121212] py-6 px-4">
        
        <div class="flex flex-col md:flex-row w-full max-w-5xl bg-[#1a1a1e] rounded-lg overflow-hidden shadow-2xl border border-white/5">
            
            <div class="w-full md:w-1/2 flex items-center justify-center p-12 bg-[#16161a] border-b md:border-b-0 md:border-r border-[#c5a373]/20">
                <img src="/img/logo.png" alt="Barbershop Logo" class="w-64 md:w-80 h-auto">
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white uppercase tracking-tighter">Bem-vindo</h2>
                    <p class="text-gray-400 text-sm mt-2">Faça login para aceder à sua conta</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-[#c5a373] !font-semibold" />
                        <x-text-input id="email" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seu-email@exemplo.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Senha')" class="text-[#c5a373] !font-semibold" />

                        <x-text-input id="password" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="********" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-700 bg-[#2a2a2e] text-[#c5a373] shadow-sm focus:ring-[#c5a373]" name="remember">
                            <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-8 flex flex-col space-y-4">
                        <button type="submit" class="w-full bg-[#c5a373] hover:bg-[#b38f5f] text-black font-bold py-3 rounded-md uppercase tracking-widest transition duration-300">
                            {{ __('Log in') }}
                        </button>

                        <div class="flex justify-between items-center mt-4">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-500 hover:text-[#c5a373] transition" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <a class="text-sm text-[#c5a373] hover:underline" href="{{ route('register') }}">
                                {{ __('Criar conta') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>