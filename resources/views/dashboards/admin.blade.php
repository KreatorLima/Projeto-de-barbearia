<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel do Administrador — Alameda Barbearia</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Mono:wght@400;500&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/iconfont/tabler-icons.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.4/chart.umd.min.js"></script>
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
  <div class="max-w-[1120px] mx-auto px-8 h-[76px] flex items-center justify-between gap-4">
    
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
          class="hidden sm:flex w-9 h-9 rounded border border-red-500/30 text-red-500 dark:text-red-400 hover:bg-red-500 hover:text-white dark:hover:text-white transition-colors items-center justify-center">
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
</header>

<main class="max-w-[1120px] mx-auto px-8 py-12 space-y-14">

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
        <span class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">R$ {{ number_format($agendamentos->sum('price') ?: $agendamentos->count(), 2, ',', '.') }}</span>
      </div>
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-calendar-week"></i> Faturamento da semana</span>
        <span class="block font-display text-3xl mt-2 text-brass dark:text-brass-dark">R$ {{ number_format($agendamentos->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->sum('price') ?: $agendamentos->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count() * 50, 2, ',', '.') }}</span>
      </div>
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-users"></i> Barbeiros ativos</span>
        <span id="activeCount" class="block font-display text-3xl mt-2">{{ $barbeirosAtivos }} <span class="text-base text-ink-dim dark:text-ink-dim-dark font-sans">/ <span id="totalCount">{{ $barbeirosTotal ?? 0 }}</span></span></span>
      </div>
    </div>

    <!-- meta mensal da loja -->
    <div class="mt-4 bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
      <div class="flex items-center justify-between mb-2.5 flex-wrap gap-1">
        <span class="font-mono text-[11px] tracking-[0.1em] uppercase text-ink-dim dark:text-ink-dim-dark flex items-center gap-1.5"><i class="ti ti-target-arrow"></i> Meta do mês (todos os barbeiros)</span>
        <span class="text-[13px] font-medium">268 / 400 cortes</span>
      </div>
      <div class="h-2.5 w-full rounded-full bg-surface-2 dark:bg-surface-2-dark overflow-hidden">
        <div id="goalBar" class="h-full rounded-full bg-brass dark:bg-brass-dark" style="width:0%" data-target="67"></div>
      </div>
      <p class="text-[13px] text-ink-dim dark:text-ink-dim-dark mt-2.5">Faltam 132 cortes para bater a meta do mês.</p>
    </div>
  </section>

  <!-- ================= RELATÓRIO DA BARBEARIA ================= -->
  <section data-reveal>
    <div class="flex items-baseline gap-3 mb-6">
      <h2 class="text-xl font-semibold">Relatório da barbearia</h2>
      <span class="text-ink-dim dark:text-ink-dim-dark font-normal text-sm">— cortes de toda a equipe por dia</span>
    </div>

    <div class="grid lg:grid-cols-[1.3fr_1fr] gap-6 items-start">
      <div class="bg-card dark:bg-card-dark border border-line dark:border-line-dark rounded-xl p-5">
        <canvas id="weekChart" height="220"></canvas>
      </div>

      <div class="border border-line dark:border-line-dark rounded-xl overflow-hidden">
        <table class="w-full text-sm">
          <thead>
            <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
              <th class="px-4 py-3 font-medium">Dia</th>
              <th class="px-4 py-3 font-medium text-right">Cortes</th>
              <th class="px-4 py-3 font-medium text-right">Faturamento</th>
            </tr>
          </thead>
          <tbody id="weekBody" class="divide-y divide-line dark:divide-line-dark"></tbody>
          <tfoot>
            <tr class="border-t border-line dark:border-line-dark font-medium">
              <td class="px-4 py-3">Total</td>
              <td id="weekTotalCuts" class="px-4 py-3 text-right font-mono text-brass dark:text-brass-dark">—</td>
              <td id="weekTotalRevenue" class="px-4 py-3 text-right font-mono text-brass dark:text-brass-dark">—</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <!-- ranking de barbeiros -->
    <div class="mt-6 border border-line dark:border-line-dark rounded-xl overflow-hidden">
      <table class="w-full text-sm">
        <thead>
          <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
            <th class="px-4 py-3 font-medium">Barbeiro</th>
            <th class="px-4 py-3 font-medium text-right">Cortes na semana</th>
            <th class="px-4 py-3 font-medium text-right">Faturamento</th>
            <th class="px-4 py-3 font-medium">Desempenho</th>
          </tr>
        </thead>
        <tbody id="rankingBody" class="divide-y divide-line dark:divide-line-dark"></tbody>
      </table>
    </div>
  </section>

  <!-- ================= CADASTRAR NOVO BARBEIRO ================= -->
  <section data-reveal>
    <div class="flex items-baseline gap-3 mb-6">
      <h2 class="text-xl font-semibold">Cadastrar novo barbeiro</h2>
    </div>

    <form id="barberForm" class="border border-line dark:border-line-dark rounded-xl p-6">
      <div class="grid sm:grid-cols-2 gap-4">
        <div>
          <label for="barberName" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Nome completo</label>
          <input type="text" id="barberName" required placeholder="Nome do barbeiro"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberRole" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Cargo / especialidade</label>
          <input type="text" id="barberRole" placeholder="Ex: Barbeiro, Barbeiro-chefe"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberEmail" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">E-mail de acesso</label>
          <input type="email" id="barberEmail" required placeholder="email@alamedabarbearia.com.br"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberPhone" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">WhatsApp</label>
          <input type="tel" id="barberPhone" required placeholder="(15) 99999-9999"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberPassword" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Senha provisória</label>
          <input type="password" id="barberPassword" required minlength="8" placeholder="Mínimo 8 caracteres"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div>
          <label for="barberPasswordConfirm" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Confirmar senha</label>
          <input type="password" id="barberPasswordConfirm" required minlength="8"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
        <div class="sm:col-span-2">
          <label for="barberSpecialties" class="block text-[13px] text-ink-dim dark:text-ink-dim-dark mb-1.5">Especialidades <span class="text-ink-dim/60 dark:text-ink-dim-dark/60">(separadas por vírgula)</span></label>
          <input type="text" id="barberSpecialties" placeholder="Ex: Navalha, Degradê, Platinado"
            class="w-full bg-transparent border border-line dark:border-line-dark rounded-lg px-4 py-3 text-sm outline-none focus:border-brass dark:focus:border-brass-dark transition-colors">
        </div>
      </div>

      <div id="formError" class="hidden mt-3 text-[13px] text-brick dark:text-brick-dark font-mono">As senhas não coincidem.</div>

      <div class="flex items-center justify-between flex-wrap gap-3 mt-6">
        <label class="flex items-center gap-2 text-[13px] text-ink-dim dark:text-ink-dim-dark cursor-pointer">
          <input type="checkbox" id="barberActive" checked class="rounded border-line dark:border-line-dark text-brass focus:ring-brass">
          Ativar barbeiro imediatamente
        </label>
        <button type="submit"
          class="font-mono text-[13px] tracking-wide bg-brass dark:bg-brass-dark text-white dark:text-surface-dark px-6 py-3.5 rounded transition-all duration-150 hover:opacity-90 hover:-translate-y-0.5 active:translate-y-0">
          Cadastrar barbeiro
        </button>
      </div>
    </form>

    <div id="formSuccess" class="hidden mt-4 border border-brass-dim dark:border-brass-dim-dark rounded-lg px-4 py-3 text-[13px] text-brass dark:text-brass-dark bg-surface-2 dark:bg-surface-2-dark">
      <i class="ti ti-circle-check mr-1"></i> Barbeiro adicionado à lista abaixo — isso é só uma visualização, ainda não está salvo no banco.
    </div>
  </section>

  <!-- ================= EQUIPE ================= -->
  <section data-reveal>
    <div class="flex items-baseline justify-between gap-3 mb-6 flex-wrap">
      <h2 class="text-xl font-semibold">Equipe</h2>
      <span id="teamCount" class="font-mono text-[12px] text-ink-dim dark:text-ink-dim-dark">3 barbeiros</span>
    </div>

    <div class="border border-line dark:border-line-dark rounded-xl overflow-hidden">
      <table class="w-full text-sm">
        <thead>
          <tr class="bg-surface-2 dark:bg-surface-2-dark text-left text-[11px] uppercase tracking-wide text-ink-dim dark:text-ink-dim-dark">
            <th class="px-4 py-3 font-medium">Barbeiro</th>
            <th class="px-4 py-3 font-medium hidden sm:table-cell">Cargo</th>
            <th class="px-4 py-3 font-medium hidden md:table-cell">Contato</th>
            <th class="px-4 py-3 font-medium">Status</th>
            <th class="px-4 py-3 font-medium text-right">Ações</th>
          </tr>
        </thead>
        <tbody id="teamBody" class="divide-y divide-line dark:divide-line-dark"></tbody>
      </table>
    </div>
  </section>

</main>

<footer class="border-t border-line dark:border-line-dark py-6 mt-4">
  <div class="max-w-[1120px] mx-auto px-8 flex flex-wrap justify-between items-center gap-3 text-xs text-ink-dim dark:text-ink-dim-dark">
    <span>© 2026 Alameda Barbearia</span>
    <a href="index.html" class="hover:text-brass dark:hover:text-brass-dark">Voltar ao site</a>
  </div>
</footer>

<script>
  document.getElementById('themeToggle').addEventListener('click', function(){
    document.documentElement.classList.toggle('dark');
    renderChart();
  });

  var revealEls = document.querySelectorAll('[data-reveal]');
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){ entry.target.classList.add('in-view'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(function(el, i){ el.style.transitionDelay = (i * 80) + 'ms'; io.observe(el); });

  // meta mensal
  var goalBar = document.getElementById('goalBar');
  requestAnimationFrame(function(){ goalBar.style.width = goalBar.dataset.target + '%'; });

  // ---------- dados fixos (mock) ----------
  var WEEK = [
    { day: 'Segunda', cuts: 10, revenue: 740 },
    { day: 'Terça',   cuts: 13, revenue: 905 },
    { day: 'Quarta',  cuts: 12, revenue: 790 },
    { day: 'Quinta',  cuts: 13, revenue: 885 },
    { day: 'Sexta',   cuts: 18, revenue: 1270 },
    { day: 'Sábado',  cuts: 22, revenue: 1475 },
  ];

  var BARBERS = [
    { name: 'Diego Alves', role: 'Barbeiro-chefe', phone: '(15) 98888-1111', status: 'ativo', cuts: 39, revenue: 2970 },
    { name: 'Rafael Melo', role: 'Barbeiro', phone: '(15) 98888-6666', status: 'ativo', cuts: 29, revenue: 1870 },
    { name: 'João Silva', role: 'Barbeiro', phone: '(15) 98888-0001', status: 'inativo', cuts: 20, revenue: 1225 },
  ];

  function money(v){ return 'R$ ' + v.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }); }
  function initials(name){ return name.trim().split(' ').slice(0,2).map(function(w){ return w[0]; }).join('').toUpperCase(); }

  // ---------- relatório semanal ----------
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

  var chart = null;
  function renderChart(){
    var isDark = document.documentElement.classList.contains('dark');
    var brass = isDark ? '#C1904F' : '#A06E2E';
    var ink = isDark ? '#A39C92' : '#6E675D';
    var grid = isDark ? '#2C2C2A' : '#E7E2D9';

    var ctx = document.getElementById('weekChart').getContext('2d');
    if (chart) chart.destroy();
    chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: WEEK.map(function(d){ return d.day.slice(0,3); }),
        datasets: [{
          label: 'Cortes',
          data: WEEK.map(function(d){ return d.cuts; }),
          backgroundColor: brass,
          borderRadius: 4,
          maxBarThickness: 36,
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { display: false }, ticks: { color: ink, font: { family: 'IBM Plex Mono', size: 11 } } },
          y: { beginAtZero: true, grid: { color: grid }, ticks: { color: ink, font: { family: 'IBM Plex Mono', size: 11 }, stepSize: 4 } }
        }
      }
    });
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

  // ---------- equipe ----------
  function statusBadge(status){
    if (status === 'ativo'){
      return '<span class="inline-flex items-center gap-1 text-[11px] font-mono border border-brass-dim dark:border-brass-dim-dark text-brass dark:text-brass-dark rounded-full px-2.5 py-1"><i class="ti ti-circle-check" style="font-size:12px"></i> Ativo</span>';
    }
    return '<span class="inline-flex items-center gap-1 text-[11px] font-mono border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark rounded-full px-2.5 py-1"><i class="ti ti-circle-minus" style="font-size:12px"></i> Inativo</span>';
  }

  function renderTeam(){
    document.getElementById('teamCount').textContent = BARBERS.length + (BARBERS.length === 1 ? ' barbeiro' : ' barbeiros');
    document.getElementById('totalCount').textContent = BARBERS.length;
    document.getElementById('activeCount').firstChild.textContent = BARBERS.filter(function(b){ return b.status === 'ativo'; }).length + ' ';

    document.getElementById('teamBody').innerHTML = BARBERS.map(function(b, i){
      return '<tr class="hover:bg-surface-2 dark:hover:bg-surface-2-dark">' +
        '<td class="px-4 py-3 font-medium flex items-center gap-3">' +
          '<span class="w-8 h-8 rounded-full bg-surface-2 dark:bg-surface-2-dark flex items-center justify-center font-display text-xs text-brass-dim dark:text-brass-dim-dark shrink-0">' + initials(b.name) + '</span>' +
          b.name +
        '</td>' +
        '<td class="px-4 py-3 text-ink-dim dark:text-ink-dim-dark hidden sm:table-cell">' + (b.role || 'Barbeiro') + '</td>' +
        '<td class="px-4 py-3 text-ink-dim dark:text-ink-dim-dark hidden md:table-cell font-mono text-[13px]">' + b.phone + '</td>' +
        '<td class="px-4 py-3">' + statusBadge(b.status) + '</td>' +
        '<td class="px-4 py-3">' +
          '<div class="flex items-center justify-end gap-2">' +
            '<button type="button" title="Editar (visual apenas)" class="inline-flex items-center justify-center w-8 h-8 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark transition-colors">' +
              '<i class="ti ti-pencil" style="font-size:14px"></i></button>' +
            '<button type="button" data-toggle="' + i + '" title="' + (b.status === 'ativo' ? 'Desativar' : 'Ativar') + '" class="inline-flex items-center justify-center w-8 h-8 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brass-dim hover:text-brass dark:hover:text-brass-dark transition-colors">' +
              '<i class="ti ' + (b.status === 'ativo' ? 'ti-toggle-right' : 'ti-toggle-left') + '" style="font-size:14px"></i></button>' +
            '<button type="button" data-remove="' + i + '" title="Remover" class="inline-flex items-center justify-center w-8 h-8 rounded border border-line dark:border-line-dark text-ink-dim dark:text-ink-dim-dark hover:border-brick hover:text-brick dark:hover:text-brick-dark transition-colors">' +
              '<i class="ti ti-trash" style="font-size:14px"></i></button>' +
          '</div>' +
        '</td>' +
      '</tr>';
    }).join('');

    document.querySelectorAll('[data-toggle]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var i = Number(btn.dataset.toggle);
        BARBERS[i].status = BARBERS[i].status === 'ativo' ? 'inativo' : 'ativo';
        renderTeam();
      });
    });
    document.querySelectorAll('[data-remove]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var i = Number(btn.dataset.remove);
        if (confirm('Remover ' + BARBERS[i].name + ' da equipe? (apenas visual, nada é salvo)')){
          BARBERS.splice(i, 1);
          renderTeam();
          renderRanking();
        }
      });
    });
  }

  // ---------- formulário de cadastro (client-side apenas) ----------
  document.getElementById('barberForm').addEventListener('submit', function(e){
    e.preventDefault();

    var pass = document.getElementById('barberPassword').value;
    var confirm = document.getElementById('barberPasswordConfirm').value;
    var errorEl = document.getElementById('formError');

    if (pass !== confirm){
      errorEl.classList.remove('hidden');
      return;
    }
    errorEl.classList.add('hidden');

    var name = document.getElementById('barberName').value.trim();
    var role = document.getElementById('barberRole').value.trim();
    var phone = document.getElementById('barberPhone').value.trim();
    var active = document.getElementById('barberActive').checked;

    BARBERS.push({
      name: name,
      role: role || 'Barbeiro',
      phone: phone,
      status: active ? 'ativo' : 'inativo',
      cuts: 0,
      revenue: 0,
    });

    renderTeam();
    renderRanking();

    this.reset();
    document.getElementById('barberActive').checked = true;

    var successEl = document.getElementById('formSuccess');
    successEl.classList.remove('hidden');
    document.getElementById('teamBody').scrollIntoView({ behavior: 'smooth', block: 'end' });
    setTimeout(function(){ successEl.classList.add('hidden'); }, 4000);
  });

  renderWeekTable();
  renderChart();
  renderRanking();
  renderTeam();
</script>

</body>
</html>