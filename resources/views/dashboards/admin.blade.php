<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>try { const savedTheme = localStorage.getItem('alameda-theme'); if (savedTheme === 'light' || savedTheme === 'dark') document.documentElement.classList.toggle('dark', savedTheme === 'dark'); } catch (error) {}</script>
<title>Painel do Administrador — Alameda Barbearia</title>
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
  #goalBar { transition: width 1s cubic-bezier(0.16, 1, 0.3, 1); }
  .row-enter { animation: fadeUp 0.4s ease; }
</style>
</head>
<body class="bg-surface dark:bg-surface-dark text-ink dark:text-ink-dark font-sans leading-relaxed antialiased transition-colors duration-200">

<!-- ================= TOPBAR ================= -->
<header class="sticky top-0 z-50 border-b border-line dark:border-line-dark bg-surface/90 dark:bg-surface-dark/90 backdrop-blur">
  <div class="max-w-[1120px] mx-auto px-4 sm:px-6 lg:px-8 h-[76px] flex items-center justify-between gap-3">
    
    <a href="/" class="flex items-center gap-2.5 font-display text-lg tracking-wide shrink-0 hover:opacity-80 transition-opacity">
      <img src="/img/logo.png" alt="Alameda Barbearia" class="h-14 w-14 invert dark:invert-0" />
      <span class="hidden sm:inline">Painel do Administrador</span>
    </a>

    <div class="flex items-center gap-3">
      
      <!-- Alternar tema -->
      <button id="themeToggle" type="button" aria-label="Alternar tema claro/escuro"
        class="w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark hover:rotate-45 transition-all duration-200 shrink-0">
        ◐
      </button>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" aria-label="Sair da conta"
          class="hidden md:flex w-9 h-9 rounded border border-red-500/30 text-red-500 dark:text-red-400 hover:bg-red-500 hover:text-white dark:hover:text-white transition-colors items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg>
        </button>
      </form>

      <!-- Menu Mobile -->
      <button id="menuToggle" type="button" aria-label="Abrir menu" aria-expanded="false"
        class="md:hidden w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark flex items-center justify-center">
        <i class="ti ti-menu-2" style="font-size:18px" aria-hidden="true" id="menuIcon"></i>
      </button>

    </div>
  </div>
  <div id="mobileMenu" class="hidden md:hidden border-t border-line dark:border-line-dark bg-surface dark:bg-surface-dark">
    <div class="max-w-[1120px] mx-auto px-4 sm:px-6 py-3">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full rounded border border-red-500/30 px-4 py-3 text-left font-mono text-xs tracking-wide text-red-500 dark:text-red-400 hover:bg-red-500 hover:text-white transition-colors">
          Sair da conta
        </button>
      </form>
    </div>
  </div>
</header>

<main class="max-w-[1120px] mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-10 sm:space-y-14">

  @if (session('success'))
    <div role="status" class="rounded-lg border border-brass-dim dark:border-brass-dim-dark bg-card dark:bg-card-dark px-4 py-3 text-sm text-brass dark:text-brass-dark">
      {{ session('success') }}
    </div>
  @endif

  <!-- ================= PERFIL + VISÃO GERAL ================= -->
  <section data-reveal>
    <div class="flex flex-wrap items-center gap-5 mb-8">
      <span class="w-16 h-16 rounded-full bg-surface-2 dark:bg-surface-2-dark flex items-center justify-center font-display text-2xl text-brass-dim dark:text-brass-dim-dark shrink-0">AB</span>
      <div>
        <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark">Visão geral da barbearia</span>
        <h1 class="font-display uppercase text-3xl md:text-4xl leading-tight">Administrador</h1>
      </div>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-scissors"></i> Cortes hoje</span>
        <span class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">
            {{ $agendamentos->where('date', now()->toDateString())->count() }}
        </span>
      </div>

      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-cash"></i> Faturamento hoje</span>
        <span class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">R$ {{ number_format($agendamentosConcluidos->sum('price') ?: $agendamentosConcluidos->count(), 2, ',', '.') }}</span>
      </div>
      
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-calendar-week"></i> Faturamento da semana</span>
        <span class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">R$ {{ number_format($semana->sum('price') ?: $semana->count() * 50, 2, ',', '.') }}</span>
      </div>

      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-users"></i> Barbeiros ativos</span>
        <span id="activeCount" class="block font-display text-3xl mt-2">{{ $barbeirosAtivos }} <span class="text-base text-ink-dim dark:text-ink-dim-dark font-sans">/ <span id="totalCount">{{ $barbeirosTotal ?? 0 }}</span></span></span>
      </div>

      <div class="lg:col-span-2 bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <div class="flex items-center justify-between gap-2">
          <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-target-arrow"></i> Meta mensal</span>
          <button type="button" id="openMetaModalBtn" title="Editar meta mensal"
            class="shrink-0 inline-flex items-center justify-center w-8 h-8 rounded-full bg-brass/10 dark:bg-brass-dark/15 text-brass dark:text-brass-dark hover:bg-brass hover:text-white dark:hover:bg-brass-dark dark:hover:text-surface-dark hover:scale-110 hover:shadow-md hover:shadow-brass/30 active:scale-95 transition-all duration-200">
            <svg class="w-6 h-6 text-#a39c93 dark:#a39c93" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
            </svg>
          </button>
        </div>
        <span class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">{{ $metaMensal }} <span class="text-base text-ink-dim dark:text-ink-dim-dark font-sans">cortes</span></span>
      </div>

      
      <button type="button" id="openBarberModalBtn" title="Cadastrar novo barbeiro"
        class="group lg:col-span-2 bg-card dark:bg-card-dark border border-dashed border-line dark:border-line-dark hover:border-brass dark:hover:border-brass-dark hover:bg-brass/[0.04] dark:hover:bg-brass-dark/[0.06] rounded-xl p-5 flex flex-row items-center justify-center gap-3 transition-colors duration-200">
        <span class="w-10 h-10 rounded-full bg-brass/10 dark:bg-brass-dark/15 text-brass dark:text-brass-dark group-hover:bg-brass group-hover:text-white dark:group-hover:bg-brass-dark dark:group-hover:text-surface-dark group-hover:scale-110 group-hover:shadow-md group-hover:shadow-brass/30 flex items-center justify-center shrink-0 transition-all duration-200">
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
          </svg>
        </span>
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark group-hover:text-brass dark:group-hover:text-brass-dark transition-colors">Cadastrar barbeiro</span>
      </button>
    </div>


    <!-- meta mensal da loja -->
    <div class="mt-4 bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
      <div class="flex items-center justify-between mb-2.5 flex-wrap gap-1">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-target-arrow"></i> Meta do mês (todos os barbeiros)</span>
        <span class="text-[13px] font-medium">{{ $agendamentosMensais->count() }} / {{ $metaMensal }} cortes</span>
      </div>
      <div class="h-2.5 w-full rounded-full bg-surface-2 dark:bg-surface-2-dark overflow-hidden">
        <div id="goalBar" class="h-full rounded-full bg-brass dark:bg-brass-dark" style="width: {{ min(100, ($agendamentosMensais->count() / $metaMensal) * 100) }}%" data-target="67"></div>
      </div>
      <p class="text-[13px] text-ink-dim dark:text-ink-dim-dark mt-2.5">Faltam {{ max(0, $metaMensal - $agendamentosMensais->count()) }} cortes para bater a meta do mês.</p>
    </div>
  </section>

  <!-- ================= RELATÓRIO DA BARBEARIA ================= -->
  <section data-reveal>
    <div class="flex items-baseline gap-3 mb-6">
      <h2 class="text-xl font-semibold">Relatório da barbearia</h2>
      <span class="text-ink-dim dark:text-ink-dim-dark font-normal text-sm">— faturamento da equipe por dia</span>
    </div>

    <div class="grid lg:grid-cols-[1.3fr_1fr] gap-6 items-start">
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        @php
          $maxFaturamentoGrafico = max(1, (float) $diasSemana->max('faturamento'));
        @endphp
        <div role="img" aria-label="Gráfico de barras do faturamento por dia da semana" class="flex h-[230px] items-end gap-2 sm:gap-4">
          @foreach ($diasSemana as $dia)
            @php
              $alturaBarra = (int) round(($dia['faturamento'] / $maxFaturamentoGrafico) * 150);
              $nomeDia = ucfirst($dia['dia']->locale('pt_BR')->translatedFormat('l'));
            @endphp
            <div class="flex h-full min-w-0 flex-1 flex-col items-center justify-end gap-2">
              <span class="whitespace-nowrap font-mono text-[10px] text-ink-dim dark:text-ink-dim-dark sm:text-xs">
                R$ {{ number_format($dia['faturamento'], 2, ',', '.') }}
              </span>
              <div class="flex h-[150px] w-full items-end justify-center border-b border-line dark:border-line-dark">
                <div
                  class="w-6 rounded-t bg-brass dark:bg-brass-dark transition-all sm:w-9"
                  style="height: {{ $alturaBarra }}px"
                  title="{{ $nomeDia }}: R$ {{ number_format($dia['faturamento'], 2, ',', '.') }}"
                ></div>
              </div>
              <span class="font-mono text-[10px] text-ink-dim dark:text-ink-dim-dark sm:text-xs">{{ mb_substr($nomeDia, 0, 3) }}</span>
            </div>
          @endforeach
        </div>
      </div>

      <div class="border border-line dark:border-line-dark rounded-xl overflow-x-auto">
        <table class="w-full min-w-[420px] text-sm">
          <thead>
            <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
              <th class="px-4 py-3 font-medium">Dia</th>
              <th class="px-4 py-3 font-medium text-right">Cortes</th>
              <th class="px-4 py-3 font-medium text-right">Faturamento</th>
            </tr>
          </thead>
          <tbody id="weekBody" class="divide-y divide-line dark:divide-line-dark">
              @foreach ($diasSemana as $dia)
              <tr>
                  <td class="px-4 py-3">{{ ucfirst($dia['dia']->locale('pt_BR')->translatedFormat('l')) }}</td>
                  <td class="px-4 py-3 text-right">{{ $dia['total'] }}</td>
                  <td class="px-4 py-3 text-right">R$ {{ number_format($dia['faturamento'], 2, ',', '.') }}</td>
              </tr>
              @endforeach
          </tbody>
          <tfoot>
            <tr class="border-t border-line dark:border-line-dark font-medium">
              <td class="px-4 py-3">Total</td>
              <td id="weekTotalCuts" class="px-4 py-3 text-right font-mono text-brass dark:text-brass-dark">{{ $diasSemana->sum('total') }}</td>
              <td id="weekTotalRevenue" class="px-4 py-3 text-right font-mono text-brass dark:text-brass-dark">R$ {{ number_format($diasSemana->sum('faturamento'), 2, ',', '.') }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <!-- ranking de barbeiros -->
    <div class="mt-6 border border-line dark:border-line-dark rounded-xl overflow-x-auto">
      <table class="w-full min-w-[560px] text-sm">
        <thead>
          <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
            <th class="px-4 py-3 font-medium">Barbeiro</th>
            <th class="px-4 py-3 font-medium text-right">Cortes na semana</th>
            <th class="px-4 py-3 font-medium text-right">Faturamento</th>
            <th class="px-4 py-3 font-medium">Desempenho</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-line dark:divide-line-dark">
          @forelse ($rankingBarbeiros as $indice => $barbeiro)
            <tr class="hover:bg-surface-2 dark:hover:bg-surface-2-dark">
              <td class="px-4 py-3 font-medium flex items-center gap-2">
                @if ($indice === 0 && $barbeiro['cortes'] > 0)
                  <i class="ti ti-trophy text-brass dark:text-brass-dark" style="font-size:15px" title="Top da semana"></i>
                @endif
                {{ $barbeiro['nome'] }}
              </td>
              <td class="px-4 py-3 text-right font-mono text-[13px]">{{ $barbeiro['cortes'] }}</td>
              <td class="px-4 py-3 text-right font-mono text-[13px]">R$ {{ number_format($barbeiro['faturamento'], 2, ',', '.') }}</td>
              <td class="px-4 py-3">
                <div class="h-1.5 w-full max-w-[140px] rounded-full bg-surface-2 dark:bg-surface-2-dark overflow-hidden">
                  <div class="h-full rounded-full bg-brass dark:bg-brass-dark" style="width: {{ min(100, round(($barbeiro['cortes'] / $maxCortesRanking) * 100)) }}%"></div>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="px-4 py-6 text-center text-ink-dim dark:text-ink-dim-dark">Nenhum barbeiro cadastrado.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>

  <!-- ================= EQUIPE ================= -->
  <section data-reveal>
    <div class="flex items-baseline justify-between gap-3 mb-6 flex-wrap">
      <h2 class="text-xl font-semibold">Equipe</h2>
      <span id="teamCount" class="font-mono text-[12px] text-ink-dim dark:text-ink-dim-dark">{{ $equipe->count() }} {{ $equipe->count() === 1 ? 'barbeiro' : 'barbeiros' }}</span>
    </div>

    <div class="border border-line dark:border-line-dark rounded-xl overflow-x-auto">
      <table class="w-full min-w-[640px] text-sm">
        <thead>
          <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
            <th class="px-4 py-3 font-medium">Barbeiro</th>
            <th class="px-4 py-3 font-medium hidden sm:table-cell">Cargo</th>
            <th class="px-4 py-3 font-medium hidden md:table-cell">Contato</th>
            <th class="px-4 py-3 font-medium">Status</th>
            <th class="px-4 py-3 font-medium text-right">Ações</th>
          </tr>
        </thead>
        <tbody id="teamBody" class="divide-y divide-line dark:divide-line-dark">
          @forelse ($equipe as $barbeiro)
              <tr class="hover:bg-surface-2 dark:hover:bg-surface-2-dark">
                  <td class="px-4 py-3 font-medium">{{ $barbeiro->user->name }}</td>
                  <td class="px-4 py-3 text-ink-dim dark:text-ink-dim-dark hidden sm:table-cell">{{ $barbeiro->cargo ?: 'Barbeiro' }}</td>
                  <td class="px-4 py-3 text-ink-dim dark:text-ink-dim-dark hidden md:table-cell font-mono text-[13px]">{{ $barbeiro->whatsapp ?: '—' }}</td>
                  <td class="px-4 py-3">
                    @if ($barbeiro->ativo)
                      <span class="inline-flex items-center gap-1 text-[11px] font-mono border border-brass-dim dark:border-brass-dim-dark text-brass dark:text-brass-dark rounded-full px-2.5 py-1"><i class="ti ti-circle-check" style="font-size:12px"></i> Ativo</span>
                    @else
                      <span class="inline-flex items-center gap-1 text-[11px] font-mono border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark rounded-full px-2.5 py-1"><i class="ti ti-circle-minus" style="font-size:12px"></i> Inativo</span>
                    @endif
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center justify-end gap-2">
                      <button type="button"
                        data-edit-barber
                        data-update-url="{{ route('admin.barbers.update', $barbeiro) }}"
                        data-name="{{ $barbeiro->user->name }}"
                        data-email="{{ $barbeiro->user->email }}"
                        data-cargo="{{ $barbeiro->cargo }}"
                        data-whatsapp="{{ $barbeiro->whatsapp }}"
                        data-especialidades="{{ $barbeiro->especialidades }}"
                        data-ativo="{{ $barbeiro->ativo ? '1' : '0' }}"
                        aria-label="Editar {{ $barbeiro->user->name }}" title="Editar barbeiro"
                        class="inline-flex items-center justify-center w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <path d="M12 20h9" />
                          <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z" />
                        </svg>
                      </button>
                      <button type="button"
                        data-delete-barber
                        data-delete-url="{{ route('admin.barbers.destroy', $barbeiro) }}"
                        data-name="{{ $barbeiro->user->name }}"
                        aria-label="Excluir {{ $barbeiro->user->name }}" title="Excluir barbeiro"
                        class="inline-flex items-center justify-center w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brick hover:text-brick dark:hover:text-brick-dark transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <path d="M3 6h18" />
                          <path d="M8 6V4h8v2" />
                          <path d="m19 6-1 14H6L5 6" />
                          <path d="M10 11v5M14 11v5" />
                        </svg>
                      </button>
                    </div>
                  </td>
              </tr>
          @empty
              <tr><td colspan="5" class="px-4 py-6 text-center text-ink-dim dark:text-ink-dim-dark">Nenhum barbeiro cadastrado.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>

</main>

<div id="metaModalOverlay" class="hidden fixed inset-0 z-[60] bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="w-full max-w-sm bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-6 relative">
    <button type="button" id="closeMetaModalBtn" aria-label="Fechar"
      class="absolute top-4 right-4 w-8 h-8 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark flex items-center justify-center transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg>
    </button>
 
    <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark flex items-center gap-1.5"><i class="ti ti-target-arrow"></i> Meta mensal</span>
    <h2 class="font-display uppercase text-xl mt-1 mb-5">Editar meta de cortes</h2>
 
    <form method="POST" action="{{ route('admin.updateMeta') }}">
      @csrf
      
      <label for="metaMensalInput" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Cortes necessários no mês (toda a equipe)</label>
      <input type="number" name="meta_mensal" id="metaMensalInput" min="1" step="1" required
        value="{{ $metaMensal }}"
        class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm font-mono outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
 
      <div class="flex items-center justify-end gap-3 mt-6">
        <button type="button" id="cancelMetaModalBtn"
          class="font-mono text-[13px] tracking-wide px-5 py-3 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark transition-colors">
          Cancelar
        </button>
        <button type="submit"
          class="font-mono text-[13px] tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-6 py-3 rounded transition-all duration-150 hover:opacity-90 hover:-translate-y-0.5 active:translate-y-0">
          Salvar meta
        </button>
      </div>
    </form>
  </div>
</div>

<div id="barberModalOverlay" class="hidden fixed inset-0 z-[60] bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
  <div class="w-full max-w-xl bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-6 relative my-8">
    <button type="button" id="closeBarberModalBtn" aria-label="Fechar"
      class="absolute top-4 right-4 w-8 h-8 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark flex items-center justify-center transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
        <path d="M9 12h12l-3 -3" />
        <path d="M18 15l3 -3" />
      </svg>
    </button>
 
    <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark flex items-center gap-1.5"><i class="ti ti-user-plus"></i> Equipe</span>
    <h2 id="barberModalTitle" class="font-display uppercase text-xl mt-1 mb-5">Cadastrar novo barbeiro</h2>
 
    <form id="barberForm" method="POST" action="{{ route('admin.barbers.store') }}" data-create-url="{{ route('admin.barbers.store') }}">
      @csrf
      <input type="hidden" name="_method" id="barberFormMethod" value="PUT" disabled>
      <div class="grid sm:grid-cols-2 gap-4">
        <div>
          <label for="barberName" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Nome completo</label>
          <input type="text" name="nome" id="barberName" required placeholder="Nome do barbeiro"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberRole" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Cargo / especialidade</label>
          <input type="text" name="cargo" id="barberRole" placeholder="Ex: Barbeiro, Barbeiro-chefe"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberEmail" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">E-mail de acesso</label>
          <input type="email" name="email" id="barberEmail" required placeholder="email@alamedabarbearia.com.br"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberPhone" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">WhatsApp</label>
          <input type="tel" name="whatsapp" id="barberPhone" placeholder="(15) 99999-9999"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberPassword" id="barberPasswordLabel" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Senha provisória</label>
          <input type="password" name="senha" id="barberPassword" required minlength="8" placeholder="Mínimo 8 caracteres"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberPasswordConfirm" id="barberPasswordConfirmLabel" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Confirmar senha</label>
          <input type="password" name="senha_confirmation" id="barberPasswordConfirm" required minlength="8"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div class="sm:col-span-2">
          <label for="barberSpecialties" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Especialidades <span class="text-ink-dim/60 dark:text-ink-dim-dark/60">(separadas por vírgula)</span></label>
          <input type="text" name="especialidades" id="barberSpecialties" placeholder="Ex: Navalha, Degradê, Platinado"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
      </div>

      <div class="flex items-center justify-between flex-wrap gap-3 mt-6">
        <label class="flex items-center gap-2 text-[13px] text-ink-dim dark:text-ink-dim-dark cursor-pointer">
          <input type="checkbox" name="ativo" value="1" id="barberActive" checked class="rounded border-line dark:border-line-dark text-brass focus:ring-brass">
          Ativar barbeiro imediatamente
        </label>
        <div class="flex items-center gap-3">
          <button type="button" id="cancelBarberModalBtn"
            class="font-mono text-[13px] tracking-wide px-5 py-3 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark transition-colors">
            Cancelar
          </button>
          <button type="submit" id="barberSubmitButton"
            class="font-mono text-[13px] tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-6 py-3.5 rounded transition-all duration-150 hover:opacity-90 hover:-translate-y-0.5 active:translate-y-0">
            Cadastrar barbeiro
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<div id="deleteBarberModalOverlay" class="hidden fixed inset-0 z-[70] bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" aria-hidden="true">
  <section role="alertdialog" aria-modal="true" aria-labelledby="deleteBarberTitle" aria-describedby="deleteBarberDescription"
    class="w-full max-w-md bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-6">
    <span class="font-mono text-xs tracking-[0.14em] uppercase text-brick dark:text-brick-dark">Remover da equipe</span>
    <h2 id="deleteBarberTitle" class="font-display uppercase text-xl mt-2">Excluir barbeiro?</h2>
    <p id="deleteBarberDescription" class="mt-3 text-sm text-ink-dim dark:text-ink-dim-dark">
      A conta de acesso e o perfil de <strong id="deleteBarberName" class="text-ink dark:text-ink-dark"></strong> serão removidos. Os agendamentos já registrados serão mantidos.
    </p>
    <form id="deleteBarberForm" method="POST" action="" class="flex items-center justify-end gap-3 mt-6">
      @csrf
      @method('DELETE')
      <button type="button" id="cancelDeleteBarberBtn"
        class="font-mono text-[13px] tracking-wide px-4 py-3 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark transition-colors">
        Cancelar
      </button>
      <button type="submit"
        class="font-mono text-[13px] tracking-wide px-4 py-3 rounded border border-brick/40 text-brick dark:text-brick-dark hover:bg-brick hover:text-white transition-colors">
        Excluir barbeiro
      </button>
    </form>
  </section>
</div>

<footer class="border-t border-line dark:border-line-dark py-6 mt-4">
  <div class="max-w-[1120px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center gap-3 text-xs text-ink-dim dark:text-ink-dim-dark">
    <span>© 2026 Alameda Barbearia</span>
    <a href="index.html" class="hover:text-brass dark:hover:text-brass-dark">Voltar ao site</a>
  </div>
</footer>

<script>
  document.getElementById('themeToggle').addEventListener('click', function(){
    var isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('alameda-theme', isDark ? 'dark' : 'light');
  });

  var menuToggle = document.getElementById('menuToggle');
  var mobileMenu = document.getElementById('mobileMenu');
  var menuIcon = document.getElementById('menuIcon');
  menuToggle.addEventListener('click', function(){
    var isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
    mobileMenu.classList.toggle('hidden', isOpen);
    menuToggle.setAttribute('aria-expanded', String(!isOpen));
    menuToggle.setAttribute('aria-label', isOpen ? 'Abrir menu' : 'Fechar menu');
    menuIcon.className = isOpen ? 'ti ti-menu-2' : 'ti ti-x';
  });

  // ---------- modal: editar meta mensal ----------
  var metaModalOverlay = document.getElementById('metaModalOverlay');
  function openMetaModal(){
    metaModalOverlay.classList.remove('hidden');
    document.getElementById('metaMensalInput').focus();
  }
  function closeMetaModal(){
    metaModalOverlay.classList.add('hidden');
  }
  document.getElementById('openMetaModalBtn').addEventListener('click', openMetaModal);
  document.getElementById('closeMetaModalBtn').addEventListener('click', closeMetaModal);
  document.getElementById('cancelMetaModalBtn').addEventListener('click', closeMetaModal);
  metaModalOverlay.addEventListener('click', function(e){
    if (e.target === metaModalOverlay) closeMetaModal();
  });
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && !metaModalOverlay.classList.contains('hidden')) closeMetaModal();
  });
 
  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){ entry.target.classList.add('in-view'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(function(el, i){ el.style.transitionDelay = (i * 80) + 'ms'; io.observe(el); });

  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){ entry.target.classList.add('in-view'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(function(el, i){ el.style.transitionDelay = (i * 80) + 'ms'; io.observe(el); });

    // ---------- modais da equipe ----------
  var barberModalOverlay = document.getElementById('barberModalOverlay');
  var barberForm = document.getElementById('barberForm');
  var barberFormMethod = document.getElementById('barberFormMethod');
  var barberModalTitle = document.getElementById('barberModalTitle');
  var barberSubmitButton = document.getElementById('barberSubmitButton');
  var barberPassword = document.getElementById('barberPassword');
  var barberPasswordConfirm = document.getElementById('barberPasswordConfirm');
  var barberPasswordLabel = document.getElementById('barberPasswordLabel');
  var barberPasswordConfirmLabel = document.getElementById('barberPasswordConfirmLabel');

  function openBarberModal(){
    barberForm.reset();
    barberForm.action = barberForm.dataset.createUrl;
    barberFormMethod.disabled = true;
    barberModalTitle.textContent = 'Cadastrar novo barbeiro';
    barberSubmitButton.textContent = 'Cadastrar barbeiro';
    barberPassword.required = true;
    barberPasswordConfirm.required = true;
    barberPasswordLabel.textContent = 'Senha provisória';
    barberPasswordConfirmLabel.textContent = 'Confirmar senha';
    barberPassword.placeholder = 'Mínimo 8 caracteres';
    barberModalOverlay.classList.remove('hidden');
    document.getElementById('barberName').focus();
  }

  function openBarberEditModal(button){
    barberForm.reset();
    barberForm.action = button.dataset.updateUrl;
    barberFormMethod.disabled = false;
    barberModalTitle.textContent = 'Editar barbeiro';
    barberSubmitButton.textContent = 'Salvar alterações';
    document.getElementById('barberName').value = button.dataset.name;
    document.getElementById('barberEmail').value = button.dataset.email;
    document.getElementById('barberRole').value = button.dataset.cargo;
    document.getElementById('barberPhone').value = button.dataset.whatsapp;
    document.getElementById('barberSpecialties').value = button.dataset.especialidades;
    document.getElementById('barberActive').checked = button.dataset.ativo === '1';
    barberPassword.required = false;
    barberPasswordConfirm.required = false;
    barberPasswordLabel.textContent = 'Nova senha (opcional)';
    barberPasswordConfirmLabel.textContent = 'Confirme a nova senha';
    barberPassword.placeholder = 'Deixe em branco para manter a senha atual';
    barberModalOverlay.classList.remove('hidden');
    document.getElementById('barberName').focus();
  }

  function closeBarberModal(){
    barberModalOverlay.classList.add('hidden');
  }

  document.getElementById('openBarberModalBtn').addEventListener('click', openBarberModal);
  document.getElementById('closeBarberModalBtn').addEventListener('click', closeBarberModal);
  document.getElementById('cancelBarberModalBtn').addEventListener('click', closeBarberModal);
  document.querySelectorAll('[data-edit-barber]').forEach(function(button){
    button.addEventListener('click', function(){ openBarberEditModal(button); });
  });
  barberModalOverlay.addEventListener('click', function(e){
    if (e.target === barberModalOverlay) closeBarberModal();
  });
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && !barberModalOverlay.classList.contains('hidden')) closeBarberModal();
  });

  var deleteBarberModalOverlay = document.getElementById('deleteBarberModalOverlay');
  var deleteBarberForm = document.getElementById('deleteBarberForm');
  function closeDeleteBarberModal(){
    deleteBarberModalOverlay.classList.add('hidden');
    deleteBarberModalOverlay.setAttribute('aria-hidden', 'true');
  }
  document.querySelectorAll('[data-delete-barber]').forEach(function(button){
    button.addEventListener('click', function(){
      deleteBarberForm.action = button.dataset.deleteUrl;
      document.getElementById('deleteBarberName').textContent = button.dataset.name;
      deleteBarberModalOverlay.classList.remove('hidden');
      deleteBarberModalOverlay.setAttribute('aria-hidden', 'false');
      document.getElementById('cancelDeleteBarberBtn').focus();
    });
  });
  document.getElementById('cancelDeleteBarberBtn').addEventListener('click', closeDeleteBarberModal);
  deleteBarberModalOverlay.addEventListener('click', function(e){
    if (e.target === deleteBarberModalOverlay) closeDeleteBarberModal();
  });
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && !deleteBarberModalOverlay.classList.contains('hidden')) closeDeleteBarberModal();
  });
 
  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){ entry.target.classList.add('in-view'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(function(el, i){ el.style.transitionDelay = (i * 80) + 'ms'; io.observe(el); });
 
  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){ entry.target.classList.add('in-view'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(function(el, i){ el.style.transitionDelay = (i * 80) + 'ms'; io.observe(el); });


  // ---------- relatório semanal ----------
  var WEEK = [
    @foreach ($diasSemana as $dia)
      {
        day: @js(ucfirst($dia['dia']->locale('pt_BR')->translatedFormat('l'))),
        cuts: @js($dia['total']),
        revenue: @js((float) $dia['faturamento']),
      },
    @endforeach
  ];

  function money(value){
    return 'R$ ' + Number(value || 0).toLocaleString('pt-BR', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
  }

  function renderWeekTable(){
    var totalCuts = WEEK.reduce(function(s,d){ return s + d.cuts; }, 0);
    var totalRevenue = WEEK.reduce(function(s,d){ return s + d.revenue; }, 0);

    document.getElementById('weekBody').innerHTML = WEEK.map(function(d){
      return '<tr class="hover:bg-surface-2 dark:hover:bg-surface-2-dark">' +
        '<td class="px-4 py-3">' + d.day + '</td>' +
        '<td class="px-4 py-3 text-right font-mono text-[13px]">' + d.cuts + '</td>' +
        '<td class="px-4 py-3 text-right font-mono text-[13px]">' + money(d.revenue) + '</td>' +
      '</tr>';
    }).join('');
    document.getElementById('weekTotalCuts').textContent = totalCuts;
    document.getElementById('weekTotalRevenue').textContent = money(totalRevenue);
  }

  // ---------- ranking ----------
  function renderRanking(){
    var sorted = BARBERS.slice().sort(function(a,b){ return b.cuts - a.cuts; });
    var max = Math.max.apply(null, BARBERS.map(function(b){ return b.cuts; })) || 1;

    document.getElementById('rankingBody').innerHTML = sorted.map(function(b, i){
      return '<tr class="hover:bg-surface-2 dark:hover:bg-surface-2-dark">' +
        '<td class="px-4 py-3 font-medium flex items-center gap-2">' +
          (i === 0 ? '<i class="ti ti-trophy text-brass dark:text-brass-dark" style="font-size:15px" title="Top da semana"></i>' : '') +
          b.name +
        '</td>' +
        '<td class="px-4 py-3 text-right font-mono text-[13px]">' + b.cuts + '</td>' +
        '<td class="px-4 py-3 text-right font-mono text-[13px]">' + money(b.revenue) + '</td>' +
        '<td class="px-4 py-3">' +
          '<div class="h-1.5 w-full max-w-[140px] rounded-full bg-surface-2 dark:bg-surface-2-dark overflow-hidden">' +
            '<div class="h-full rounded-full bg-brass dark:bg-brass-dark" style="width:' + Math.round((b.cuts / max) * 100) + '%"></div>' +
          '</div>' +
        '</td>' +
      '</tr>';
    }).join('');
  }

  renderWeekTable();
</script>

</body>
</html>
