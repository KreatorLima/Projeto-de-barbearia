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

                        <a href="{{ route('auth.google') }}"
                           class="w-full flex items-center justify-center gap-3 border border-white/10 hover:border-[#c5a373] text-white font-semibold py-3 rounded-md transition duration-300">
                            <svg class="w-5 h-5" viewBox="0 0 48 48" aria-hidden="true">
                                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 3.01 13.22l7.98 6.19C12.7 13.72 17.9 9.5 24 9.5z"/>
                                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6C44.4 37.9 46.98 31.8 46.98 24.55z"/>
                                <path fill="#FBBC05" d="M10.99 28.59A14.4 14.4 0 0 1 10.22 24c0-1.59.27-3.13.76-4.59L3.01 13.22A23.9 23.9 0 0 0 0 24c0 3.87.93 7.52 2.58 10.78l8.41-6.19z"/>
                                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.9-5.8l-7.73-6c-2.15 1.45-4.89 2.3-8.17 2.3-6.1 0-11.3-4.22-13.17-9.99l-8.41 6.19C6.51 42.62 14.62 48 24 48z"/>
                            </svg>
                            Entrar com Google
                        </a>

                        <div class="flex justify-between items-center mt-4">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-500 hover:text-[#c5a373] transition" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
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
