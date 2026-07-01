<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 dark:bg-[#121212] dark:text-white min-h-screen transition-colors duration-200">
    <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white dark:bg-[#121212] border-b border-gray-200 dark:border-gray-800 transition-colors duration-200">
        <nav class="relative max-w-360 w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <div class="flex items-center justify-between">
                <img src="/img/logo.png" alt="Barbershop Logo" class="w-16 h-auto invert dark:invert-0 transition-all duration-200">

                <div class="md:hidden">
                    <button type="button" class="hs-collapse-toggle relative size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-line-inverse/50 text-foreground-inverse hover:bg-plain/10 focus:outline-hidden focus:bg-plain/10 disabled:opacity-50 disabled:pointer-events-none" id="hs-base-header-collapse" aria-expanded="false" aria-controls="hs-base-header" aria-label="Toggle navigation" data-hs-collapse="#hs-base-header">
                        <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                        <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
                </div>
            <div id="hs-base-header" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-base-header-collapse" role="region">
                <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track-inverse [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb-inverse">
                    <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">
                        <a class="p-2 flex items-center text-sm rounded-lg transition-colors duration-150 text-gray-600 hover:bg-[#121212] hover:text-white dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            Sobre nós
                        </a>

                        <a class="p-2 flex items-center text-sm rounded-lg transition-colors duration-150 text-gray-600 hover:bg-[#121212] hover:text-white dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            Serviços
                        </a>

                        <a class="p-2 flex items-center text-sm rounded-lg transition-colors duration-150 text-gray-600 hover:bg-[#121212] hover:text-white dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            Agende já
                        </a>

                        <a class="p-2 flex items-center text-sm rounded-lg transition-colors duration-150 text-gray-600 hover:bg-[#121212] hover:text-white dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                            Contato
                        </a>

                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit" class="w-full md:w-auto p-2 flex items-center text-sm rounded-lg transition-colors duration-150 text-red-600 hover:bg-red-50 hover:text-red-700 dark:text-red-400 dark:hover:bg-red-950/40 dark:hover:text-red-300 font-medium">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2">
                <svg id="theme-toggle-dark-icon" class="hidden size-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden size-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 14.444l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
        </nav>
    </header>

    <script>
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Aplica o tema correto logo no carregamento inicial
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            themeToggleDarkIcon.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            // Alterna os ícones visíveis
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Se foi definido no localStorage anteriormente
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                // Se não tiver no localStorage, checa a classe atual da tag html
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
    </nav>
    </header>
</body>
</html>