<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#121212] py-6 px-4">
        
        <div class="flex flex-col md:flex-row w-full max-w-6xl bg-[#1a1a1e] rounded-lg overflow-hidden shadow-2xl border border-white/5">
            
            <div class="w-full md:w-1/2 flex items-center justify-center p-12 bg-[#16161a] border-b md:border-b-0 md:border-r border-[#c5a373]/20">
                <img src="/img/logo.png" alt="Barbershop Logo" class="w-64 md:w-80 h-auto">
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white uppercase tracking-tighter">Registrar</h2>
                    <p class="text-gray-400 text-sm mt-2">Crie sua conta para acessar o sistema</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nome')" class="text-[#c5a373] !font-semibold" />
                        <x-text-input id="name" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" class="text-[#c5a373] !font-semibold" />
                        <x-text-input id="email" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Senha')" class="text-[#c5a373] !font-semibold" />

                        <x-text-input id="password" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirme a senha')" class="text-[#c5a373] !font-semibold" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-8 flex flex-col space-y-4">
                        <button type="submit" class="w-full bg-[#c5a373] hover:bg-[#b38f5f] text-black font-bold py-3 rounded-md uppercase tracking-widest transition duration-300">
                            {{ __('Register') }}
                        </button>

                        <div class="text-center">
                            <a class="underline text-sm text-gray-400 hover:text-[#c5a373] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c5a373]" href="{{ route('login') }}">
                                {{ __('Já tem uma conta? Faça login') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>