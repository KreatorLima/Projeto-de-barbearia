<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alameda Barbearia</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Mono:wght@400;500&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/iconfont/tabler-icons.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<style>
  @keyframes fadeUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
  @keyframes fadeRight { from { opacity: 0; transform: translateX(28px); } to { opacity: 1; transform: translateX(0); } }

  .hero-anim { opacity: 0; animation: fadeUp 0.7s ease forwards; }
  .hero-anim-right { opacity: 0; animation: fadeRight 0.8s ease forwards; }

  [data-reveal] { opacity: 0; transform: translateY(22px); transition: opacity 0.6s ease, transform 0.6s ease; }
  [data-reveal].in-view { opacity: 1; transform: translateY(0); }

  @media (prefers-reduced-motion: reduce) {
    .hero-anim, .hero-anim-right { animation: none; opacity: 1; transform: none; }
    [data-reveal] { transition: none; opacity: 1; transform: none; }
  }

  .nav-link { position: relative; }
  .nav-link::after {
    content: ''; position: absolute; left: 0; bottom: -4px;
    width: 0; height: 1px; background: currentColor;
    transition: width 0.25s ease;
  }
  .nav-link:hover::after, .nav-link.text-brass::after { width: 100%; }
</style>
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
</head>
<body class="bg-red-200 dark:bg-surface-dark text-ink dark:text-ink-dark font-sans leading-relaxed antialiased transition-colors duration-200">

<!-- ================= NAV ================= -->
<header class="sticky top-0 z-50 border-b border-line dark:border-line-dark bg-surface/90 dark:bg-surface-dark/90 backdrop-blur">
  <nav class="max-w-[1120px] mx-auto px-8 h-[76px] flex items-center justify-between">
    <div class="flex items-center gap-2.5 font-display text-xl tracking-wide">
      <img src="/img/logo.png" alt="Alameda Barbearia" class="h-14 w-14 invert dark:invert-0" />
    </div>
    
    <div class="hidden md:flex gap-8 text-sm text-ink-dim dark:text-ink-dim-dark">
      <a href="#agende-ja" data-nav-link class="hover:text-brass dark:hover:text-brass-dark transition-colors">Agende já</a>
      <a href="#sobre" data-nav-link class="hover:text-brass dark:hover:text-brass-dark transition-colors">Sobre nós</a>
      <a href="#servicos" data-nav-link class="hover:text-brass dark:hover:text-brass-dark transition-colors">Serviços</a>
      <a href="#contato" data-nav-link class="hover:text-brass dark:hover:text-brass-dark transition-colors">Contatos</a>
    </div>
    
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

  <!-- menu mobile -->
  <div id="mobileMenu" class="hidden md:hidden border-t border-line dark:border-line-dark bg-surface dark:bg-surface-dark">
    <div class="max-w-[1120px] mx-auto px-8 py-4 flex flex-col gap-1 text-sm">
      <a href="#agende-ja" data-nav-link class="py-3 border-b border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Agende já</a>
      <a href="#sobre" data-nav-link class="py-3 border-b border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Sobre nós</a>
      <a href="#servicos" data-nav-link class="py-3 border-b border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Serviços</a>
      <a href="#contato" data-nav-link class="py-3 text-ink-dim dark:text-ink-dim-dark hover:text-brass dark:hover:text-brass-dark">Contatos</a>
      <a href="#agende-ja" class="mt-3 text-center font-mono text-xs tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-5 py-3 rounded">Agendar horário</a>
    </div>
  </div>
</header>

<!-- ================= 1. AGENDE JÁ ================= -->
<section id="agende-ja" class="border-b border-line dark:border-line-dark py-24 scroll-mt-[76px]">
  <div class="max-w-[1120px] mx-auto px-8 grid md:grid-cols-[1.15fr_0.85fr] gap-14 items-center">
    <div>
      <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark">Barbearia de bairro desde 2016</span>
      <h1 class="font-display uppercase leading-[1.05] text-[48px] md:text-[72px] mt-2.5">
        Corte na régua,<br><span class="text-brass dark:text-brass-dark">sem pressa</span>.
      </h1>
      <p class="max-w-[460px] text-ink-dim dark:text-ink-dim-dark text-[17px] my-6">
        Barba, corte e navalha do jeito tradicional — com agenda online pra você não perder tempo esperando na cadeira errada.
      </p>
      <div class="flex flex-wrap items-center gap-3.5">
        <a href="{{ route('scheduling.index') }}" class="font-mono text-[13px] tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-7 py-4 rounded hover:opacity-90">
          Ver horários disponíveis
        </a>
        <a href="#servicos" class="font-mono text-[13px] tracking-wide text-ink-dim dark:text-ink-dim-dark border-b border-line dark:border-line-dark py-4 hover:text-ink dark:hover:text-ink-dark hover:border-ink-dim">
          Ver serviços e preços
        </a>
      </div>
    </div>

    <!-- ticket / elemento de assinatura -->
    <div class="relative bg-card dark:bg-card-dark border border-dashed border-brass-dim dark:border-brass-dim-dark rounded-xl px-7 pt-7 pb-6">
      <span class="absolute -left-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-surface dark:bg-surface-dark border border-dashed border-brass-dim dark:border-brass-dim-dark"></span>
      <span class="absolute -right-3 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-surface dark:bg-surface-dark border border-dashed border-brass-dim dark:border-brass-dim-dark"></span>

      <div class="flex justify-between items-baseline border-b border-dashed border-line dark:border-line-dark pb-3.5 mb-3.5">
        <div>
          <span class="font-mono text-xs uppercase tracking-[0.14em] text-brass dark:text-brass-dark">Ficha de atendimento</span>
          <h3 class="font-display text-xl mt-1">Corte + Barba</h3>
        </div>
        <span class="font-mono text-xs text-ink-dim dark:text-ink-dim-dark">Nº 0842</span>
      </div>

      <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5">
        <span>Barbeiro</span><b class="text-ink dark:text-ink-dark font-medium">Diego Alves</b>
      </div>
      <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5">
        <span>Data</span><b class="text-ink dark:text-ink-dark font-medium">Sáb, 14:30</b>
      </div>
      <div class="flex justify-between text-sm text-ink-dim dark:text-ink-dim-dark py-1.5">
        <span>Duração</span><b class="text-ink dark:text-ink-dark font-medium">50 min</b>
      </div>

      <div class="flex justify-between items-center border-t border-dashed border-line dark:border-line-dark mt-3 pt-3.5">
        <span class="font-mono text-xs uppercase tracking-[0.14em] text-brass dark:text-brass-dark">Total</span>
        <span class="font-mono text-xl text-brass dark:text-brass-dark">R$ 75,00</span>
      </div>
    </div>
  </div>

  <!-- passo a passo do agendamento -->
  <div class="max-w-[1120px] mx-auto px-8 mt-20">
    <div class="grid md:grid-cols-3 gap-8">
      <div class="border-l border-brass-dim dark:border-brass-dim-dark pl-5">
        <span class="font-mono text-[13px] text-brass dark:text-brass-dark">01</span>
        <h3 class="text-lg font-semibold mt-2.5 mb-2">Escolha o serviço</h3>
        <p class="text-sm text-ink-dim dark:text-ink-dim-dark">Corte, barba ou o combo. Você vê o preço antes de marcar.</p>
      </div>
      <div class="border-l border-brass-dim dark:border-brass-dim-dark pl-5">
        <span class="font-mono text-[13px] text-brass dark:text-brass-dark">02</span>
        <h3 class="text-lg font-semibold mt-2.5 mb-2">Escolha o barbeiro e o horário</h3>
        <p class="text-sm text-ink-dim dark:text-ink-dim-dark">Agenda em tempo real, sem ligar pra confirmar vaga.</p>
      </div>
      <div class="border-l border-brass-dim dark:border-brass-dim-dark pl-5">
        <span class="font-mono text-[13px] text-brass dark:text-brass-dark">03</span>
        <h3 class="text-lg font-semibold mt-2.5 mb-2">Chegue e sente</h3>
        <p class="text-sm text-ink-dim dark:text-ink-dim-dark">Você recebe a confirmação por WhatsApp com endereço e horário.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 2. SOBRE NÓS ================= -->
<section id="sobre" class="border-b border-line dark:border-line-dark py-20 scroll-mt-[76px]">
  <div class="max-w-[1120px] mx-auto px-8">
    <div class="max-w-[560px] mb-11">
      <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark">Nossa história</span>
      <h2 class="font-display uppercase text-[32px] md:text-[42px] mt-2.5">Sobre nós</h2>
      <p class="text-ink-dim dark:text-ink-dim-dark text-[15px] mt-4">
        Abrimos as portas em 2016 numa esquina do Centro de Boituva, com uma cadeira e uma navalha.
        Hoje somos três barbeiros e uma clientela que virou vizinhança. O compromisso continua o mesmo:
        atendimento marcado, sem enrolação, e um corte que dura a semana inteira.
      </p>
    </div>

    <!-- equipe -->
    <div class="grid md:grid-cols-3 gap-6 mb-16">
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl overflow-hidden">
        <div class="h-[220px] bg-surface-2 dark:bg-surface-2-dark border-b border-line dark:border-line-dark flex items-center justify-center font-display text-4xl text-brass-dim dark:text-brass-dim-dark">DA</div>
        <div class="px-5 pt-5 pb-5">
          <h3 class="text-lg font-semibold">Diego Alves</h3>
          <div class="font-mono text-[13px] text-brass dark:text-brass-dark my-1.5">Barbeiro-chefe · 12 anos</div>
          <div class="flex flex-wrap gap-1.5">
            <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark px-2.5 py-1 rounded-full">Navalha</span>
            <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark px-2.5 py-1 rounded-full">Degradê</span>
          </div>
        </div>
      </div>
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl overflow-hidden">
        <div class="h-[220px] bg-surface-2 dark:bg-surface-2-dark border-b border-line dark:border-line-dark flex items-center justify-center font-display text-4xl text-brass-dim dark:text-brass-dim-dark">RM</div>
        <div class="px-5 pt-5 pb-5">
          <h3 class="text-lg font-semibold">Rafael Melo</h3>
          <div class="font-mono text-[13px] text-brass dark:text-brass-dark my-1.5">Barbeiro · 6 anos</div>
          <div class="flex flex-wrap gap-1.5">
            <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark px-2.5 py-1 rounded-full">Barba</span>
            <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark px-2.5 py-1 rounded-full">Pigmentação</span>
          </div>
        </div>
      </div>
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl overflow-hidden">
        <div class="h-[220px] bg-surface-2 dark:bg-surface-2-dark border-b border-line dark:border-line-dark flex items-center justify-center font-display text-4xl text-brass-dim dark:text-brass-dim-dark">JS</div>
        <div class="px-5 pt-5 pb-5">
          <h3 class="text-lg font-semibold">João Silva</h3>
          <div class="font-mono text-[13px] text-brass dark:text-brass-dark my-1.5">Barbeiro · 4 anos</div>
          <div class="flex flex-wrap gap-1.5">
            <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark px-2.5 py-1 rounded-full">Corte infantil</span>
            <span class="text-[11px] text-ink-dim dark:text-ink-dim-dark border border-line dark:border-line-dark px-2.5 py-1 rounded-full">Platinado</span>
          </div>
        </div>
      </div>
    </div>

    <!-- depoimentos -->
    <div class="grid md:grid-cols-3 gap-6">
      <div class="relative bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-6">
        <span class="absolute top-4 right-4 rotate-3 font-mono text-[10px] tracking-wide text-brass-dim dark:text-brass-dim-dark border border-brass-dim dark:border-brass-dim-dark rounded px-1.5 py-0.5">5 estrelas</span>
        <p class="text-[15px] mb-4">Marquei pelo site, cheguei e fui direto atendido. Acabou o tempo perdido esperando.</p>
        <div class="font-mono text-[13px] text-ink-dim dark:text-ink-dim-dark">— Marcos T.</div>
      </div>
      <div class="relative bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-6">
        <span class="absolute top-4 right-4 rotate-3 font-mono text-[10px] tracking-wide text-brass-dim dark:text-brass-dim-dark border border-brass-dim dark:border-brass-dim-dark rounded px-1.5 py-0.5">5 estrelas</span>
        <p class="text-[15px] mb-4">O Diego entende de degradê como ninguém no bairro. Ambiente sem enrolação.</p>
        <div class="font-mono text-[13px] text-ink-dim dark:text-ink-dim-dark">— Felipe R.</div>
      </div>
      <div class="relative bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-6">
        <span class="absolute top-4 right-4 rotate-3 font-mono text-[10px] tracking-wide text-brass-dim dark:text-brass-dim-dark border border-brass-dim dark:border-brass-dim-dark rounded px-1.5 py-0.5">5 estrelas</span>
        <p class="text-[15px] mb-4">Levei meu filho pro primeiro corte e o barbeiro teve muita paciência.</p>
        <div class="font-mono text-[13px] text-ink-dim dark:text-ink-dim-dark">— André C.</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 3. SERVIÇOS ================= -->
<section id="servicos" class="border-b border-line dark:border-line-dark py-20 scroll-mt-[76px]">
  <div class="max-w-[1120px] mx-auto px-8">
    <div class="max-w-[560px] mb-11">
      <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark">Cardápio de serviços</span>
      <h2 class="font-display uppercase text-[32px] md:text-[42px] mt-2.5">O que fazemos aqui dentro</h2>
    </div>

    <div class="grid md:grid-cols-2 gap-x-16">
      <div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Corte tradicional</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Máquina e tesoura, acabamento na navalha</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 45</span>
        </div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Barba desenhada</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Toalha quente, navalha e hidratação</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 40</span>
        </div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Corte + barba</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">O combo completo, sem pressa</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 75</span>
        </div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Sobrancelha</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Navalha ou pinça</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 20</span>
        </div>
      </div>

      <div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Pigmentação de barba</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Disfarça falhas, dura até 3 semanas</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 60</span>
        </div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Corte infantil</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Até 10 anos</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 35</span>
        </div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Relaxamento</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Escova progressiva masculina</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">R$ 90</span>
        </div>
        <div class="flex items-baseline gap-2.5 py-4 border-b border-line dark:border-line-dark">
          <div><span class="text-base">Platinado</span><span class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mt-0.5">Descoloração + tonalização</span></div>
          <div class="flex-1 border-b border-dotted border-line dark:border-line-dark -translate-y-1"></div>
          <span class="font-mono text-[15px] text-brass dark:text-brass-dark whitespace-nowrap">a partir de R$ 120</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 4. CONTATOS ================= -->
<section id="contato" class="py-20 scroll-mt-[76px]">
  <div class="max-w-[1120px] mx-auto px-8">
    <div class="max-w-[560px] mb-11">
      <span class="font-mono text-xs tracking-[0.14em] uppercase text-brass dark:text-brass-dark">Fale com a gente</span>
      <h2 class="font-display uppercase text-[32px] md:text-[42px] mt-2.5">Contatos</h2>
    </div>

    <div class="grid md:grid-cols-[1.2fr_0.8fr_0.8fr] gap-12">
      <div>
        <h3 class="font-mono text-[15px] text-brass dark:text-brass-dark mb-4">Endereço</h3>
        <p class="text-sm text-ink-dim dark:text-ink-dim-dark">Rua das Alamedas, 214 — Centro<br>Boituva, SP</p>
        <div class="flex gap-3.5 mt-3.5">
          <a href="#" class="text-[13px] text-ink-dim dark:text-ink-dim-dark border-b border-line dark:border-line-dark">Instagram</a>
          <a href="#" class="text-[13px] text-ink-dim dark:text-ink-dim-dark border-b border-line dark:border-line-dark">WhatsApp</a>
          <a href="#" class="text-[13px] text-ink-dim dark:text-ink-dim-dark border-b border-line dark:border-line-dark">Google Maps</a>
        </div>
      </div>
      <div>
        <h3 class="font-mono text-[15px] text-brass dark:text-brass-dark mb-4">Horário</h3>
        <div class="flex justify-between text-sm py-1.5 border-b border-dotted border-line dark:border-line-dark">
          <span class="text-ink-dim dark:text-ink-dim-dark">Ter — Sex</span><b class="font-medium">9h às 20h</b>
        </div>
        <div class="flex justify-between text-sm py-1.5 border-b border-dotted border-line dark:border-line-dark">
          <span class="text-ink-dim dark:text-ink-dim-dark">Sábado</span><b class="font-medium">8h às 18h</b>
        </div>
        <div class="flex justify-between text-sm py-1.5 border-b border-dotted border-line dark:border-line-dark">
          <span class="text-ink-dim dark:text-ink-dim-dark">Dom / Seg</span><b class="font-medium">Fechado</b>
        </div>
      </div>
      <div>
        <h3 class="font-mono text-[15px] text-brass dark:text-brass-dark mb-4">Contato direto</h3>
        <p class="text-sm text-ink-dim dark:text-ink-dim-dark">(15) 99123-4567<br>contato@alamedabarbearia.com.br</p>
        <a href="#agende-ja" class="inline-block mt-4 font-mono text-[13px] tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-5 py-3 rounded hover:opacity-90">
          Agendar horário
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="border-t border-line dark:border-line-dark py-6">
  <div class="max-w-[1120px] mx-auto px-8 flex flex-wrap justify-between items-center gap-3 text-xs text-ink-dim dark:text-ink-dim-dark">
    <span>© 2026 Barber shop</span>
  </div>
</footer>

<script>
  document.getElementById('themeToggle').addEventListener('click', function(){
    document.documentElement.classList.toggle('dark');
  });

  // menu mobile
  var menuBtn = document.getElementById('menuToggle');
  var mobileMenu = document.getElementById('mobileMenu');
  var menuIcon = document.getElementById('menuIcon');
  menuBtn.addEventListener('click', function(){
    var isOpen = !mobileMenu.classList.contains('hidden');
    mobileMenu.classList.toggle('hidden');
    menuBtn.setAttribute('aria-expanded', String(!isOpen));
    menuIcon.className = isOpen ? 'ti ti-menu-2' : 'ti ti-x';
  });
  document.querySelectorAll('#mobileMenu [data-nav-link]').forEach(function(link){
    link.addEventListener('click', function(){
      mobileMenu.classList.add('hidden');
      menuBtn.setAttribute('aria-expanded', 'false');
      menuIcon.className = 'ti ti-menu-2';
    });
  });

  // destaque da section ativa no menu
  var navLinks = document.querySelectorAll('[data-nav-link]');
  var sections = ['agende-ja', 'sobre', 'servicos', 'contato'].map(function(id){
    return document.getElementById(id);
  });
  var observer = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){
        navLinks.forEach(function(link){
          var match = link.getAttribute('href') === '#' + entry.target.id;
          link.classList.toggle('text-brass', match);
          link.classList.toggle('dark:text-brass-dark', match);
        });
      }
    });
  }, { rootMargin: '-40% 0px -55% 0px' });
  sections.forEach(function(sec){ if (sec) observer.observe(sec); });
</script>

</body>
</html>