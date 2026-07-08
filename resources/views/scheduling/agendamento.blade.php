<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendar horário — Alameda Barbearia</title>
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
  .hero-anim { opacity: 0; animation: fadeUp 0.7s ease forwards; }
  [data-reveal] { opacity: 0; transform: translateY(22px); transition: opacity 0.6s ease, transform 0.6s ease; }
  [data-reveal].in-view { opacity: 1; transform: translateY(0); }
  @media (prefers-reduced-motion: reduce) {
    .hero-anim { animation: none; opacity: 1; transform: none; }
    [data-reveal] { transition: none; opacity: 1; transform: none; }
  }
  .nav-link { position: relative; }
  .nav-link::after {
    content: ''; position: absolute; left: 0; bottom: -4px;
    width: 0; height: 1px; background: currentColor;
    transition: width 0.25s ease;
  }
  .nav-link:hover::after { width: 100%; }

  .pick-card input:checked + label {
    border-color: #A06E2E;
    background: #F6F4F1;
  }
  .dark .pick-card input:checked + label {
    border-color: #C1904F;
    background: #1A1A1A;
  }
  .pick-card input:checked + label .check-dot {
    opacity: 1;
    transform: scale(1);
  }
  .check-dot { opacity: 0; transform: scale(0.5); transition: all 0.2s ease; }

  #slotsTable table td, #slotsTable table th { min-width: 64px; }
  #slotsTable { -webkit-overflow-scrolling: touch; }
</style>
</head>
<body class="bg-surface dark:bg-surface-dark text-ink dark:text-ink-dark font-sans leading-relaxed antialiased transition-colors duration-200">

<header class="sticky top-0 z-50 border-b border-line dark:border-line-dark bg-surface/90 dark:bg-surface-dark/90 backdrop-blur">
  <nav class="max-w-[1120px] mx-auto px-8 h-[76px] flex items-center justify-between">
    <a href="index.html" class="flex items-center gap-2.5 font-display text-xl tracking-wide hover:opacity-80 transition-opacity">
      <img src="/img/logo.png" alt="Alameda Barbearia" class="h-14 w-14 invert dark:invert-0" />
    </a>
    <div class="hidden md:flex gap-8 text-sm text-ink-dim dark:text-ink-dim-dark">
      <a href="{{ route('dashboard') }}" class="nav-link hover:text-brass dark:hover:text-brass-dark transition-colors">Sobre nós</a>
      <a href="{{ route('dashboard') }}#servicos" class="nav-link hover:text-brass dark:hover:text-brass-dark transition-colors">Serviços</a>
      <a href="{{ route('dashboard') }}#contato" class="nav-link hover:text-brass dark:hover:text-brass-dark transition-colors">Contatos</a>
      <a href="{{ route('scheduling.index') }}" class="nav-link text-brass dark:text-brass-dark">Agendar já</a>
    </div>
    <div class="flex items-center">
      <button id="themeToggle" type="button" aria-label="Alternar tema claro/escuro"
        class="w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark hover:rotate-45 transition-all duration-200">
        ◐
      </button>
      <button id="menuToggle" type="button" aria-label="Abrir menu" aria-expanded="false"
        class="md:hidden ml-3 w-9 h-9 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark flex items-center justify-center">
        <i class="ti ti-menu-2" style="font-size:18px" aria-hidden="true" id="menuIcon"></i>
      </button>
    </div>
  </nav>

  <div id="mobileMenu" class="md:hidden overflow-hidden max-h-0 transition-[max-height] duration-300 ease-in-out bg-surface dark:bg-surface-dark">
    <div class="max-w-[1120px] mx-auto px-8 py-4 flex flex-col gap-1 text-sm">
      <a href="index.html#sobre" class="py-3 border-b border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Sobre nós</a>
      <a href="index.html#servicos" class="py-3 border-b border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Serviços</a>
      <a href="index.html#contato" class="py-3 text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Contatos</a>
      <a href="agendamento.html" class="mt-3 text-center font-mono text-xs tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-5 py-3 rounded">Agendar já</a>
    </div>
  </div>
</header>

<section class="border-b border-line dark:border-line-dark py-14">
  <div class="max-w-[1120px] mx-auto px-8">
    <span class="hero-anim block font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark" style="animation-delay:0ms">Agendamento online</span>
    <h1 class="hero-anim font-display uppercase leading-[1.05] text-[36px] md:text-[52px] mt-2.5" style="animation-delay:80ms">Marque seu horário</h1>
    <p class="hero-anim max-w-[520px] text-ink-dim dark:text-ink-dim-dark text-[15px] mt-4" style="animation-delay:160ms">
      Escolha o serviço, o barbeiro e o horário. Leva menos de um minuto — e você ainda pode confirmar tudo direto pelo WhatsApp.
    </p>
  </div>
</section>

<section class="py-16">
  <div class="max-w-[1120px] mx-auto px-8 grid lg:grid-cols-[1fr_360px] gap-12 items-start">

    <form id="bookingForm" action="{{ route('agendamentos.store') }}" method="POST" class="space-y-14">
      @csrf
      
      <input type="hidden" name="date" id="input_selected_date">
      <input type="hidden" name="time" id="input_selected_time">

      <div data-reveal>
        <div class="flex items-baseline gap-3 mb-6">
          <span class="font-mono text-[13px] text-brass dark:text-brass-dark">01</span>
          <h2 class="text-xl font-semibold">Escolha o serviço</h2>
        </div>
        <div class="grid sm:grid-cols-2 gap-3" id="serviceGrid">

          <div class="pick-card">
            <input type="radio" name="service" id="svc-1" value="Corte tradicional" data-price="45" class="peer hidden">
            <label for="svc-1" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Corte tradicional</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Máquina e tesoura</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 45</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-2" value="Barba desenhada" data-price="40" class="peer hidden">
            <label for="svc-2" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Barba desenhada</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Navalha e hidratação</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 40</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-3" value="Corte + barba" data-price="75" class="peer hidden" checked>
            <label for="svc-3" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Corte + barba</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">O combo completo</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 75</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-4" value="Sobrancelha" data-price="20" class="peer hidden">
            <label for="svc-4" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Sobrancelha</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Navalha ou pinça</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 20</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-5" value="Pigmentação de barba" data-price="60" class="peer hidden">
            <label for="svc-5" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Pigmentação de barba</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Dura até 3 semanas</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 60</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-6" value="Corte infantil" data-price="35" class="peer hidden">
            <label for="svc-6" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Corte infantil</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Até 10 anos</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 35</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-7" value="Relaxamento" data-price="90" class="peer hidden">
            <label for="svc-7" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Relaxamento</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Escova progressiva</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">R$ 90</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="service" id="svc-8" value="Platinado" data-price="120" class="peer hidden">
            <label for="svc-8" class="relative flex items-center justify-between gap-3 border border-line dark:border-line-dark rounded-lg px-4 py-3.5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span>
                <span class="block text-sm font-medium">Platinado</span>
                <span class="block text-[12px] text-ink-dim dark:text-ink-dim-dark">Descoloração + tonalização</span>
              </span>
              <span class="flex items-center gap-2 shrink-0">
                <span class="font-mono text-[13px] text-brass dark:text-brass-dark">a partir de R$ 120</span>
                <span class="check-dot w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              </span>
            </label>
          </div>

        </div>
      </div>

      <div data-reveal>
        <div class="flex items-baseline gap-3 mb-6">
          <span class="font-mono text-[13px] text-brass dark:text-brass-dark">02</span>
          <h2 class="text-xl font-semibold">Escolha o profissional</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3" id="barberGrid">

          <div class="pick-card">
            <input type="radio" name="barber" id="brb-0" value="Sem preferência" class="peer hidden" checked>
            <label for="brb-0" class="relative flex flex-col items-center text-center gap-2 border border-line dark:border-line-dark rounded-lg px-3 py-5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span class="check-dot absolute top-2 right-2 w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              <span class="w-12 h-12 rounded-full border border-dashed border-brass-dim dark:border-brass-dim-dark flex items-center justify-center text-ink-dim dark:text-ink-dim-dark">
                <i class="ti ti-users" style="font-size:20px"></i>
              </span>
              <span class="text-sm font-medium">Sem preferência</span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="barber" id="brb-1" value="Diego Alves" class="peer hidden">
            <label for="brb-1" class="relative flex flex-col items-center text-center gap-2 border border-line dark:border-line-dark rounded-lg px-3 py-5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span class="check-dot absolute top-2 right-2 w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              <span class="w-12 h-12 rounded-full bg-surface-2 dark:bg-surface-2-dark flex items-center justify-center font-display text-lg text-brass-dim dark:text-brass-dim-dark">DA</span>
              <span class="text-sm font-medium">Diego Alves</span>
              <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark -mt-1">Barbeiro-chefe</span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="barber" id="brb-2" value="Rafael Melo" class="peer hidden">
            <label for="brb-2" class="relative flex flex-col items-center text-center gap-2 border border-line dark:border-line-dark rounded-lg px-3 py-5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span class="check-dot absolute top-2 right-2 w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              <span class="w-12 h-12 rounded-full bg-surface-2 dark:bg-surface-2-dark flex items-center justify-center font-display text-lg text-brass-dim dark:text-brass-dim-dark">RM</span>
              <span class="text-sm font-medium">Rafael Melo</span>
              <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark -mt-1">Barba · pigmentação</span>
            </label>
          </div>

          <div class="pick-card">
            <input type="radio" name="barber" id="brb-3" value="João Silva" class="peer hidden">
            <label for="brb-3" class="relative flex flex-col items-center text-center gap-2 border border-line dark:border-line-dark rounded-lg px-3 py-5 cursor-pointer transition-all duration-150 hover:border-brass-dim">
              <span class="check-dot absolute top-2 right-2 w-4 h-4 rounded-full bg-brass dark:bg-brass-dark flex items-center justify-center"><i class="ti ti-check text-white" style="font-size:11px"></i></span>
              <span class="w-12 h-12 rounded-full bg-surface-2 dark:bg-surface-2-dark flex items-center justify-center font-display text-lg text-brass-dim dark:text-brass-dim-dark">JS</span>
              <span class="text-sm font-medium">João Silva</span>
              <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark -mt-1">Infantil · platinado</span>
            </label>
          </div>

        </div>
      </div>

      <div data-reveal>
        <div class="flex items-baseline gap-3 mb-2">
          <span class="font-mono text-[13px] text-brass dark:text-brass-dark">03</span>
          <h2 class="text-xl font-semibold">Escolha o dia e o horário</h2>
        </div>
        <p class="text-[13px] text-ink-dim dark:text-ink-dim-dark mb-5">Toque em um horário livre na tabela. Células em cinza já estão ocupadas.</p>

        <div class="border border-line dark:border-line-dark rounded-xl p-4 overflow-x-auto bg-white dark:bg-slate-900" id="slotsTable">
          <table class="w-full border-collapse">
            <thead>
              <tr>
                <th class="p-1 pb-3"></th>
                @php
                  $diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
                  $colunasDias = [];
                  
                  for ($i = 0; $i < 6; $i++) {
                      $timestamp = strtotime("+$i days");
                      $colunasDias[] = [
                          'db_date' => date('Y-m-d', $timestamp),
                          'dia_texto' => $diasSemana[date('w', $timestamp)],
                          'dia_numero' => date('d', $timestamp),
                          'label_completo' => $diasSemana[date('w', $timestamp)] . ', ' . date('d/m', $timestamp)
                      ];
                  }
                  
                  $horarios = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                @endphp

                @foreach($colunasDias as $dia)
                  <th class="p-1 pb-3 text-center font-mono text-[11px] font-medium text-ink-dim dark:text-ink-dim-dark whitespace-nowrap">
                    {{ $dia['dia_texto'] }}
                    <span class="block text-brass dark:text-brass-dark text-[13px] font-semibold">{{ $dia['dia_numero'] }}</span>
                  </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach($horarios as $hora)
                <tr>
                  <td class="p-1 pr-3 text-right font-mono text-[11px] text-ink-dim dark:text-ink-dim-dark whitespace-nowrap">
                    {{ $hora }}
                  </td>

                  @foreach($colunasDias as $dia)
                    @php
                        $estaOcupado = false;
                        
                        // Verifica se existem agendamentos e roda um loop limpo e seguro
                        if (isset($agendamentos) && (is_array($agendamentos) || is_object($agendamentos))) {
                            foreach ($agendamentos as $value) {
                                if ($value && isset($value->date) && isset($value->time)) {
                                    if ($value->date === $dia['db_date'] && date('H:i', strtotime($value->time)) === $hora) {
                                        $estaOcupado = true;
                                        break;
                                    }
                                }
                            }
                        }

                        $ehDomingo = date('w', strtotime($dia['db_date'])) == 0;
                    @endphp

                    <td class="p-1">
                      @if($estaOcupado)
                        <span class="block text-center text-[11px] font-mono text-ink-dim dark:text-ink-dim-dark bg-surface-2 dark:bg-surface-2-dark rounded py-2.5 cursor-not-allowed line-through decoration-line dark:decoration-line-dark">
                          Ocupado
                        </span>
                      @elseif($ehDomingo)
                        <span class="block text-center text-[11px] text-ink-dim/40 dark:text-ink-dim-dark/30 py-2.5">—</span>
                      @else
                        <button type="button" 
                                data-slot 
                                data-db-date="{{ $dia['db_date'] }}"
                                data-day="{{ $dia['label_completo'] }}" 
                                data-time="{{ $hora }}" 
                                class="w-full text-center text-[12px] font-mono text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark rounded py-2.5 transition-all duration-150 hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark hover:-translate-y-0.5 active:translate-y-0">
                          {{ $hora }}
                        </button>
                      @endif
                    </td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div id="slotError" class="hidden mt-3 text-[13px] text-brick dark:text-brick-dark font-mono">Selecione um horário na tabela acima.</div>
      </div>

      <div data-reveal>
        <div class="flex items-baseline gap-3 mb-6">
          <span class="font-mono text-[13px] text-brass dark:text-brass-dark">04</span>
          <h2 class="text-xl font-semibold">Seus dados</h2>
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
          <div class="sm:col-span-2">
            <label for="clientName" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Nome completo</label>
            <input type="text" id="clientName" name="name" required placeholder="Como podemos te chamar"
              class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
          </div>
          <div class="sm:col-span-2">
            <label for="clientPhone" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">WhatsApp</label>
            <input type="tel" id="clientPhone" name="phone" required placeholder="(15) 99999-9999"
              class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
          </div>
          <div class="sm:col-span-2">
            <label for="clientNote" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Observações <span class="text-ink-dim/60 dark:text-ink-dim-dark/60">(opcional)</span></label>
            <textarea id="clientNote" name="notes" rows="3" placeholder="Alguma preferência ou observação?"
              class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors resize-none"></textarea>
          </div>
        </div>
      </div>

    </form>

    <aside data-reveal class="lg:sticky lg:top-[100px]">
      <div class="relative bg-card dark:bg-card-dark border border-dashed border-brass-dim dark:border-brass-dim-dark rounded-xl px-6 pt-6 pb-5.5">
        <span class="absolute -left-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-surface dark:bg-surface-dark border border-dashed border-brass-dim dark:border-brass-dim-dark"></span>
        <span class="absolute -right-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-surface dark:bg-surface-dark border border-dashed border-brass-dim dark:border-brass-dim-dark"></span>

        <div class="flex justify-between items-baseline border-b border-dashed border-line dark:border-line-dark pb-3.5 mb-3.5">
          <div>
            <span class="font-mono text-xs uppercase tracking-[0.14em] text-brass dark:text-brass-dark">Resumo</span>
            <h3 id="summaryService" class="font-display text-xl mt-1">Corte + Barba</h3>
          </div>
          <span class="font-mono text-xs text-ink-dim dark:text-ink-dim-dark">Nº <span id="summaryTicketNo">0843</span></span>
        </div>

        <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5">
          <span>Barbeiro</span><b id="summaryBarber" class="text-ink dark:text-ink-dark font-medium">Sem preferência</b>
        </div>
        <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5">
          <span>Data</span><b id="summaryDay" class="text-ink dark:text-ink-dark font-medium">—</b>
        </div>
        <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5">
          <span>Horário</span><b id="summaryTime" class="text-ink dark:text-ink-dark font-medium">—</b>
        </div>

        <div class="flex justify-between items-center border-t border-dashed border-line dark:border-line-dark mt-3 pt-3.5">
          <span class="font-mono text-xs uppercase tracking-[0.14em] text-brass dark:text-brass-dark">Total</span>
          <span id="summaryPrice" class="font-mono text-xl text-brass dark:text-brass-dark">R$ 75,00</span>
        </div>
      </div>

      <div class="mt-5 space-y-3">
        <button type="submit" form="bookingForm" id="confirmBtn"
          class="w-full font-mono text-[13px] tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-6 py-4 rounded transition-all duration-150 hover:opacity-90 hover:-translate-y-0.5 active:translate-y-0 disabled:opacity-40 disabled:pointer-events-none">
          Confirmar agendamento
        </button>
        <a href="#" id="whatsappBtn" target="_blank" rel="noopener"
          class="flex items-center justify-center gap-2 w-full font-mono text-[13px] tracking-wide border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark px-6 py-4 rounded transition-all duration-150 hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark hover:-translate-y-0.5 active:translate-y-0 pointer-events-none opacity-40">
          <i class="ti ti-brand-whatsapp" style="font-size:16px"></i>
          Enviar pelo WhatsApp
        </a>
      </div>

      <div id="confirmMsg" class="hidden mt-4 border border-brass-dim dark:border-brass-dim-dark rounded-lg px-4 py-3 text-[13px] text-brass dark:text-brass-dark bg-surface-2 dark:bg-surface-2-dark">
        <i class="ti ti-circle-check mr-1"></i> Agendamento recebido! Em breve confirmamos por WhatsApp.
      </div>
    </aside>

  </div>
</section>

<footer class="border-t border-line dark:border-line-dark py-6">
  <div class="max-w-[1120px] mx-auto px-8 flex flex-wrap justify-between items-center gap-3 text-xs text-ink-dim dark:text-ink-dim-dark">
    <span>© 2026 Alameda Barbearia</span>
    <a href="index.html" class="hover:text-brass dark:hover:text-brass-dark">Voltar ao site</a>
  </div>
</footer>

<script>
  // tema
  document.getElementById('themeToggle').addEventListener('click', function(){
    document.documentElement.classList.toggle('dark');
  });

  // menu mobile
  var menuBtn = document.getElementById('menuToggle');
  var mobileMenu = document.getElementById('mobileMenu');
  var menuIcon = document.getElementById('menuIcon');
  function setMenu(open){
    mobileMenu.classList.toggle('max-h-0', !open);
    mobileMenu.classList.toggle('max-h-[320px]', open);
    menuBtn.setAttribute('aria-expanded', String(open));
    menuIcon.className = open ? 'ti ti-x' : 'ti ti-menu-2';
  }
  menuBtn.addEventListener('click', function(){
    setMenu(mobileMenu.classList.contains('max-h-0'));
  });

  // reveal on scroll
  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){
        entry.target.classList.add('in-view');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(function(el, i){
    el.style.transitionDelay = (i * 60) + 'ms';
    io.observe(el);
  });

  // ---------- estado do agendamento ----------
  var state = { service: null, price: 0, barber: 'Sem preferência', day: null, time: null };

  var WHATSAPP_NUMBER = '5515991145977';

  function money(v){
    return 'R$ ' + v.toFixed(2).replace('.', ',');
  }

  function updateSummary(){
    document.getElementById('summaryService').textContent = state.service || 'Selecione um serviço';
    document.getElementById('summaryBarber').textContent = state.barber;
    document.getElementById('summaryDay').textContent = state.day || '—';
    document.getElementById('summaryTime').textContent = state.time || '—';
    document.getElementById('summaryPrice').textContent = money(state.price);

    var ready = state.service && state.day && state.time &&
      document.getElementById('clientName').value.trim() &&
      document.getElementById('clientPhone').value.trim();

    var confirmBtn = document.getElementById('confirmBtn');
    var waBtn = document.getElementById('whatsappBtn');
    confirmBtn.disabled = !ready;
    waBtn.classList.toggle('opacity-40', !ready);
    waBtn.classList.toggle('pointer-events-none', !ready);

    if (ready){
      var name = document.getElementById('clientName').value.trim();
      var note = document.getElementById('clientNote').value.trim();
      var msg = 'Olá! Quero agendar um horário na Alameda Barbearia.%0A' +
        '%0AServiço: ' + encodeURIComponent(state.service) +
        '%0ABarbeiro: ' + encodeURIComponent(state.barber) +
        '%0AData: ' + encodeURIComponent(state.day) +
        '%0AHorário: ' + encodeURIComponent(state.time) +
        '%0ANome: ' + encodeURIComponent(name) +
        (note ? '%0AObs: ' + encodeURIComponent(note) : '');
      waBtn.href = 'https://wa.me/' + WHATSAPP_NUMBER + '?text=' + msg;
    }
  }

  document.querySelectorAll('input[name="service"]').forEach(function(input){
    input.addEventListener('change', function(){
      state.service = input.value;
      state.price = parseFloat(input.dataset.price);
      updateSummary();
    });
    if (input.checked){ state.service = input.value; state.price = parseFloat(input.dataset.price); }
  });

  document.querySelectorAll('input[name="barber"]').forEach(function(input){
    input.addEventListener('change', function(){
      state.barber = input.value;
      updateSummary();
    });
  });

  // Evento de clique para as células injetadas
  document.addEventListener('click', function(e) {
    var btn = e.target.closest('[data-slot]');
    if (!btn) return;
    
    document.querySelectorAll('[data-slot]').forEach(function(b){
      b.classList.remove('bg-brass', 'dark:bg-brass-dark', 'text-white', 'dark:text-surface-dark', 'border-brass', 'dark:border-brass-dark');
      b.classList.add('border-line', 'dark:border-line-dark');
    });
    btn.classList.add('bg-brass', 'dark:bg-brass-dark', 'text-white', 'dark:text-surface-dark', 'border-brass', 'dark:border-brass-dark');
    btn.classList.remove('border-line', 'dark:border-line-dark');
    state.day = btn.dataset.day;
    state.time = btn.dataset.time;

    // Alimenta os inputs nativos escondidos que enviam os dados ao Laravel
    document.getElementById('input_selected_date').value = btn.dataset.dbDate;
    document.getElementById('input_selected_time').value = btn.dataset.time;

    document.getElementById('slotError').classList.add('hidden');
    updateSummary();
  });

  document.getElementById('clientName').addEventListener('input', updateSummary);
  document.getElementById('clientPhone').addEventListener('input', updateSummary);
  document.getElementById('clientNote').addEventListener('input', updateSummary);

  // Tratamento de envio do formulário
  document.getElementById('bookingForm').addEventListener('submit', function(e){
    if (!state.day || !state.time){
      e.preventDefault();
      document.getElementById('slotError').classList.remove('hidden');
      document.getElementById('slotsTable').scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  });

  document.getElementById('confirmBtn').addEventListener('click', function(e) {
    if (state.day && state.time && document.getElementById('clientName').value.trim() && document.getElementById('clientPhone').value.trim()) {
      document.getElementById('bookingForm').submit();
    }
  });

  updateSummary();
</script>

</body>
</html>