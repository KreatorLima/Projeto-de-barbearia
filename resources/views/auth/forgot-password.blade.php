<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#121212] py-6 px-4">
        
        <div class="flex flex-col md:flex-row w-full max-w-5xl bg-[#1a1a1e] rounded-lg overflow-hidden shadow-2xl border border-white/5">
            
            <div class="w-full md:w-1/2 flex items-center justify-center p-12 bg-[#16161a] border-b md:border-b-0 md:border-r border-[#c5a373]/20">
                <img src="/img/logo.png" alt="Barbershop Logo" class="w-64 md:w-80 h-auto">
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-white uppercase tracking-tighter text-center">Recuperar Senha</h2>
                    <p class="mt-4 text-sm text-gray-400 leading-relaxed text-center">
                        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link para você escolher uma nova.') }}
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-[#c5a373] !font-semibold" />
                        <x-text-input id="email" class="block mt-1 w-full !bg-[#2a2a2e] !border-transparent focus:!border-[#c5a373] !text-white !py-3" type="email" name="email" :value="old('email')" required autofocus placeholder="seu-email@exemplo.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-8 flex flex-col space-y-4">
                        <button type="submit" class="w-full bg-[#c5a373] hover:bg-[#b38f5f] text-black font-bold py-3 rounded-md uppercase tracking-widest transition duration-300">
                            {{ __('Resete a senha com o e-mail') }}
                        </button>

                        <div class="text-center">
                            <a class="text-sm text-gray-500 hover:text-[#c5a373] transition" href="{{ route('login') }}">
                                {{ __('Voltar para o login') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>