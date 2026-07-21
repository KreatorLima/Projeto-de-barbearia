<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel do Barbeiro — Alameda Barbearia</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Mono:wght@400;500&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/iconfont/tabler-icons.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    darkMode: 'class',
    theme: {
      extend: {
        colors: {
          surface:      { DEFAULT: '#FFFFFF', dark: '#121212' },
          'surface-2':  { DEFAULT: '#F6F4F1', dark: '#1A1A1A' },
          card:         { DEFAULT: '#FBFAF8', dark: '#1C1C1C' },
          ink:          { DEFAULT: '#1C1815', dark: '#EAE6DF' },
          'ink-dim':    { DEFAULT: '#6E675D', dark: '#A39C92' },
          brass:        { DEFAULT: '#A06E2E', dark: '#C1904F' },
          'brass-dim':  { DEFAULT: '#C9A876', dark: '#8A6836' },
          brick:        { DEFAULT: '#8E3226', dark: '#A8402F' },
          line:         { DEFAULT: '#E7E2D9', dark: '#2C2C2A' },
        },
        fontFamily: {
          display: ['Anton', 'sans-serif'],
          mono: ['"IBM Plex Mono"', 'monospace'],
          sans: ['"Work Sans"', 'sans-serif'],
        },
      },
    },
  }
</script>
<style>
  @keyframes fadeUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
  .hero-anim { opacity: 0; animation: fadeUp 0.6s ease forwards; }
  [data-reveal] { opacity: 0; transform: translateY(20px); transition: opacity 0.5s ease, transform 0.5s ease; }
  [data-reveal].in-view { opacity: 1; transform: translateY(0); }
  @media (prefers-reduced-motion: reduce) {
    .hero-anim { animation: none; opacity: 1; transform: none; }
    [data-reveal] { transition: none; opacity: 1; transform: none; }
  }
  tbody tr { transition: background-color 0.15s ease; }
  #statCuts, #statRevenue { transition: opacity 0.2s ease; }

  #goalBar { transition: width 1s cubic-bezier(0.16, 1, 0.3, 1); }

  @media print {
    body * { visibility: hidden; }
    #closingTicket, #closingTicket * { visibility: visible; }
    #closingTicket { position: absolute; top: 0; left: 0; width: 100%; border: none; }
    #printBtn { display: none; }
  }
</style>
</head>
<body class="bg-surface dark:bg-surface-dark text-ink dark:text-ink-dark font-sans leading-relaxed antialiased transition-colors duration-200">

<header class="sticky top-0 z-50 border-b border-line dark:border-line-dark bg-surface/90 dark:bg-surface-dark/90 backdrop-blur">
  <nav class="max-w-[1120px] mx-auto px-8 h-[76px] flex items-center justify-between">
    <a href="/" class="flex items-center gap-2.5 font-display text-xl tracking-wide">
      <img src="/img/logo.png" alt="Alameda Barbearia" class="h-14 w-14 invert dark:invert-0" />
    </a>
    
    <div class="flex items-center gap-3">
      <a href="{{ route('scheduling.index') }}" class="hidden sm:inline-block font-mono text-xs tracking-wide border border-brass-dim dark:border-brass-dim-dark text-brass dark:text-brass-dark px-5 py-2.5 rounded hover:bg-brass dark:hover:bg-brass-dark hover:text-white dark:hover:text-surface-dark whitespace-nowrap">
        Agendar horário
      </a>

      <button id="themeToggle" type="button" aria-label="Alternar tema claro/escuro"
        class="w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark">
        ◐
      </button>

      <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" aria-label="Sair da conta" class="hidden sm:flex w-9 h-9 rounded border border-red-500/30 text-red-500 dark:text-red-400 hover:bg-red-500 hover:text-white dark:hover:text-white transition-colors items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg>
        </button>
      </form>
      
      <button id="menuToggle" type="button" aria-label="Abrir menu" aria-expanded="false"
        class="md:hidden w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark flex items-center justify-center">
        <i class="ti ti-menu-2" style="font-size:18px" aria-hidden="true" id="menuIcon"></i>
      </button>
    </div>
  </nav>

  <div id="mobileMenu" class="hidden md:hidden border-t border-line dark:border-line-dark bg-surface dark:bg-surface-dark">
      <form method="POST" action="{{ route('logout') }}" class="mt-2">
        @csrf
        <button type="submit" class="w-full text-center font-mono text-xs tracking-wide border border-red-500/30 text-red-500 dark:text-red-400 px-5 py-3 rounded hover:bg-red-500 hover:text-white transition-colors">
          Sair da Conta
        </button>
      </form>
    </div>
  </div>
</header>

<main class="max-w-[1120px] mx-auto px-8 py-12 space-y-14">

  <section data-reveal>
    <div class="flex flex-wrap items-center gap-5 mb-8">
      <span id="barberAvatar" class="w-16 h-16 rounded-full bg-surface-2 dark:bg-surface-2-dark flex items-center justify-center font-display text-2xl text-brass-dim dark:text-brass-dim-dark shrink-0">
        {{ strtoupper(substr(auth()->user()->name ?? 'Barbeiro', 0, 2)) }}
      </span>
      <div>
        <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark">Bem-vindo de volta</span>
        <h1 id="barberName" class="font-display uppercase text-3xl md:text-4xl leading-tight">
          {{ auth()->user()->name ?? 'Diego Alves' }}
        </h1>
      </div>
    </div>

    <div class="grid sm:grid-cols-3 gap-4">
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-scissors"></i> Agendamentos Hoje</span>
        <span id="statCuts" class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">
          {{ $agendamentos->count() }}
        </span>
      </div>
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-cash"></i> Previsão do Dia</span>
        <span id="statRevenue" class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">
          R$ {{ number_format($agendamentos->sum('price') ?: $agendamentos->count() * 50, 2, ',', '.') }}
        </span>
      </div>
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-clock"></i> Próximo cliente</span>
        @if($agendamentos->first())
          <span id="statNext" class="block font-display text-3xl mt-2">
            {{ \Carbon\Carbon::parse($agendamentos->first()->time)->format('H:i') }}
          </span>
          <span id="statNextName" class="text-[13px] text-ink-dim dark:text-ink-dim-dark">
            {{ $agendamentos->first()->name }}
          </span>
        @else
          <span id="statNext" class="block font-display text-3xl mt-2">—</span>
          <span id="statNextName" class="text-[13px] text-ink-dim dark:text-ink-dim-dark">Nenhum agendamento</span>
        @endif
      </div>
    </div>

    <div class="mt-4 bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
      <div class="flex items-center justify-between mb-2.5 flex-wrap gap-1">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-target-arrow"></i> Meta do dia</span>
        <span id="goalLabel" class="text-[13px] font-medium">{{ $agendamentos->count() }} / 10 agendamentos</span>
      </div>
      <div class="h-2.5 w-full rounded-full bg-surface-2 dark:bg-surface-2-dark overflow-hidden">
        <div id="goalBar" class="h-full rounded-full bg-brass dark:bg-brass-dark" style="width: {{ min(100, ($agendamentos->count() / 10) * 100) }}%"></div>
      </div>
      <p id="goalMsg" class="text-[13px] text-ink-dim dark:text-ink-dim-dark mt-2.5">
        @if($agendamentos->count() >= 10)
          Meta batida para hoje! 🎉
        @else
          Faltam {{ 10 - $agendamentos->count() }} agendamento(s) para atingir a meta do dia.
        @endif
      </p>
    </div>
  </section>

  <section data-reveal>
    <div class="flex items-baseline justify-between gap-3 mb-6 flex-wrap">
      <h2 class="text-xl font-semibold">
        Agenda de hoje 
        <span class="text-ink-dim dark:text-ink-dim-dark font-normal text-sm">— {{ \Carbon\Carbon::now()->locale('pt_BR')->translatedFormat('D, d/m') }}</span>
      </h2>
      <span id="agendaCount" class="font-mono text-[12px] text-ink-dim dark:text-ink-dim-dark">
        {{ $agendamentos->count() }} {{ \Illuminate\Support\Str::plural('cliente', $agendamentos->count()) }}
      </span>
    </div>

    <div class="border border-line dark:border-line-dark rounded-xl overflow-hidden">
      <table class="w-full text-sm">
        <thead>
          <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
            <th class="px-4 py-3 font-medium">Horário</th>
            <th class="px-4 py-3 font-medium">Cliente</th>
            <th class="px-4 py-3 font-medium hidden sm:table-cell">Serviço</th>
            <th class="px-4 py-3 font-medium text-right">Valor</th>
            <th class="px-4 py-3 font-medium">Status</th>
            <th class="px-4 py-3 font-medium text-right">Contato</th>
          </tr>
        </thead>
        <tbody id="agendaBody" class="divide-y divide-line dark:divide-line-dark">
            @forelse($agendamentos as $item)
                <tr class="hover:bg-surface-2 dark:hover:bg-surface-2-dark">
                    <td class="px-4 py-3 font-mono text-[13px] text-ink-dim dark:text-ink-dim-dark whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($item->time)->format('H:i') }}
                    </td>

                    <td class="px-4 py-3 font-medium">
                        {{ $item->name }}
                    </td>

                    <td class="px-4 py-3 text-ink-dim dark:text-ink-dim-dark hidden sm:table-cell">
                        {{ $item->service }}
                    </td>

                    <td class="px-4 py-3 text-right font-mono text-[13px]">
                        R$ {{ number_format($item->price ?? 50, 2, ',', '.') }}
                    </td>

                    <td class="px-4 py-3 whitespace-nowrap">
                        @if(($item->status ?? 'Pendente') === 'Concluído' || ($item->status ?? '') === 'Confirmado')
                            <span class="inline-flex items-center gap-1 text-[11px] font-mono border border-emerald-500/30 bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-full px-2.5 py-1">
                                <i class="ti ti-circle-check" style="font-size:12px"></i> Concluído
                            </span>
                        @else
                            <form method="POST" action="{{ route('scheduling.updateStatus', $item->id ?? 1) }}" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="Concluído">
                                <button type="submit" class="inline-flex items-center gap-1.5 text-[11px] font-mono border border-brass-dim dark:border-brass-dim-dark text-brass dark:text-brass-dark hover:bg-brass hover:text-white dark:hover:bg-brass-dark dark:hover:text-surface-dark transition-colors rounded-full px-3 py-1 cursor-pointer">
                                    <i class="ti ti-check" style="font-size:12px"></i> Finalizar corte
                                </button>
                            </form>
                        @endif
                    </td>

                    <td class="px-4 py-3 text-right">
                        @php
                            $primeiroNome = explode(' ', trim($item->name))[0];
                            $mensagem = urlencode("Olá {$primeiroNome}! Confirmando seu horário de {$item->service} às " . \Carbon\Carbon::parse($item->time)->format('H:i') . ".");
                        @endphp
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->phone) }}?text={{ $mensagem }}" 
                        target="_blank" 
                        rel="noopener"
                        title="Chamar no WhatsApp"
                        class="inline-flex items-center justify-center w-8 h-8 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-emerald-500 hover:bg-emerald-500/10 transition-colors">
                            <span class="[&>svg]:h-4 [&>svg]:w-4 [&>svg]:fill-[#128c7e] dark:[&>svg]:fill-[#25D366]">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 448 512">
                                <path
                                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                </svg>
                            </span>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-ink-dim dark:text-ink-dim-dark font-mono text-sm">
                        Nenhum agendamento encontrado para hoje.
                    </td>
                </tr>
            @endforelse
        </tbody>
      </table>
    </div>
  </section>

  <section data-reveal>
    <div class="flex items-baseline justify-between gap-3 mb-6 flex-wrap">
      <h2 class="text-xl font-semibold">Fechamento do dia</h2>
      <button id="printBtn" type="button" onclick="window.print()"
        class="flex items-center gap-1.5 font-mono text-[12px] tracking-wide border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark px-4 py-2 rounded transition-all duration-150 hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark">
        <i class="ti ti-printer" style="font-size:14px"></i> Imprimir fechamento
      </button>
    </div>

    <div id="closingTicket" class="relative max-w-md bg-card dark:bg-card-dark border border-dashed border-brass-dim dark:border-brass-dim-dark rounded-xl px-6 pt-6 pb-5.5">
      <span class="absolute -left-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-surface dark:bg-surface-dark border border-dashed border-brass-dim dark:border-brass-dim-dark"></span>
      <span class="absolute -right-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-surface dark:bg-surface-dark border border-dashed border-brass-dim dark:border-brass-dim-dark"></span>

      <div class="flex justify-between items-baseline border-b border-dashed border-line dark:border-line-dark pb-3.5 mb-3.5">
        <div>
          <span class="font-mono text-xs uppercase tracking-[0.14em] text-brass dark:text-brass-dark">Alameda Barbearia</span>
          <h3 id="closingBarber" class="font-display text-xl mt-1">{{ auth()->user()->name ?? 'Diego Alves' }}</h3>
        </div>
        <span class="font-mono text-xs text-ink-dim dark:text-ink-dim-dark">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
      </div>

      <div id="closingLines" class="space-y-1.5 mb-3.5">
        @forelse($agendamentos as $agendamento)
            <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1">
                <span>{{ $agendamento->service }} <span class="text-ink-dim/60 dark:text-ink-dim-dark/60">({{ $agendamento->name }})</span></span>
                <b class="text-ink dark:text-ink-dark font-medium">R$ {{ number_format($agendamento->price ?? 50, 2, ',', '.') }}</b>
            </div>
        @empty
            <p class="text-sm text-ink-dim dark:text-ink-dim-dark">Nenhum atendimento realizado hoje.</p>
        @endforelse
      </div>

      <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5 border-t border-dashed border-line dark:border-line-dark pt-3">
        <span>Atendimentos agendados</span><b id="closingCount" class="text-ink dark:text-ink-dark font-medium">{{ $agendamentos->count() }}</b>
      </div>

      <div class="flex justify-between items-center border-t border-dashed border-line dark:border-line-dark mt-3 pt-3.5">
        <span class="font-mono text-xs uppercase tracking-[0.14em] text-brass dark:text-brass-dark">Total estimado</span>
        <span id="closingTotal" class="font-mono text-xl text-brass dark:text-brass-dark">
            R$ {{ number_format($agendamentos->sum('price') ?: $agendamentos->count() * 50, 2, ',', '.') }}
        </span>
      </div>
    </div>
  </section>

</main>

<footer class="border-t border-line dark:border-line-dark py-6 mt-4">
  <div class="max-w-[1120px] mx-auto px-8 flex flex-wrap justify-between items-center gap-3 text-xs text-ink-dim dark:text-ink-dim-dark">
    <span>© 2026 Alameda Barbearia</span>
    <a href="/" class="hover:text-brass dark:hover:text-brass-dark">Voltar ao site</a>
  </div>
</footer>

<script>
  // Alternar Modo Escuro / Claro
  document.getElementById('themeToggle').addEventListener('click', function(){
    document.documentElement.classList.toggle('dark');
  });

  // Alternar Menu Mobile
  const menuToggle = document.getElementById('menuToggle');
  const mobileMenu = document.getElementById('mobileMenu');
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function(){
      mobileMenu.classList.toggle('hidden');
    });
  }

  // Animações data-reveal
  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){ entry.target.classList.add('in-view'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(function(el, i){ el.style.transitionDelay = (i * 80) + 'ms'; io.observe(el); });
</script>

</body>
</html>