<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheduling;
use App\Models\Barber;
use Illuminate\Validation\Rule;

class SchedulingController extends Controller
{
    // Exibe a página com a tabela de horários de agendamento (Cliente)
    public function index()
    {
        // Busca todos os agendamentos do banco para marcar como "Ocupado" na tabela
        $agendamentos = Scheduling::orderBy('date', 'asc')->get();
        $reservas = $agendamentos->map(fn (Scheduling $agendamento) => [
            'date' => (string) $agendamento->date,
            'time' => substr((string) $agendamento->time, 0, 5),
            'barber' => $agendamento->barber,
        ])->values();
        $barbeiros = Barber::with('user')
            ->where('ativo', true)
            ->whereHas('user', fn ($query) => $query->where('role', 'manager'))
            ->get();
        
        // Retorna a view injetando a variável $agendamentos
        return view('scheduling.agendamento', compact('agendamentos', 'barbeiros', 'reservas'));
    }

    // Salva o agendamento no Banco de Dados
    public function store(Request $request)
    {
        $barbeirosDisponiveis = Barber::query()
            ->where('ativo', true)
            ->whereHas('user', fn ($query) => $query->where('role', 'manager'))
            ->with('user:id,name')
            ->get()
            ->pluck('user.name')
            ->push('Sem preferência')
            ->all();

        // 1. Validação dos campos
        $request->validate([
            'service' => 'required|string',
            'barber'  => ['required', 'string', Rule::in($barbeirosDisponiveis)],
            'date'    => 'required|date',
            'time'    => 'required',
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string',
            'notes'   => 'nullable|string',
        ]);

        $conflito = Scheduling::where('date', $request->date)
            ->where('time', $request->time)
            ->when($request->barber !== 'Sem preferência', function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('barber', $request->barber)
                        ->orWhere('barber', 'Sem preferência');
                });
            })
            ->exists();

        if ($conflito) {
            return back()
                ->withErrors(['time' => 'Esse horário já está ocupado para o barbeiro selecionado.'])
                ->withInput();
        }

        $precos = [
            'Corte tradicional'    => 45.00,
            'Corte + Barba'        => 75.00,
            'Pigmentação de barba' => 60.00,
            'Relaxamento'          => 90.00,
            'Barba desenhada'      => 40.00,
            'Sobrancelha'          => 20.00,
            'Corte infantil'       => 35.00,
            'Platinado'            => 120.00,
            
        ];

        $precoFinal = $precos[$request->service] ?? 50.00;

        Scheduling::create([
            'service' => $request->service,
            'barber'  => $request->barber,
            'date'    => $request->date,
            'time'    => $request->time,
            'name'    => $request->name,
            'phone'   => $request->phone,
            'notes'   => $request->notes,
            'price'   => $precoFinal,
        ]);

        return redirect()->back()->with('success', 'Agendamento realizado com sucesso!');
    }

    // Painel do Barbeiro (Manager)
    public function manager()
    {
        // 1. Busca todos os agendamentos cadastrados para o dia de hoje
        $agendamentos = Scheduling::whereDate('date', today())
            ->orderBy('time', 'asc')
            ->get();

        // 2. Retorna a view dentro de 'dashboards/manager.blade.php' passando os agendamentos
        return view('dashboards.manager', compact('agendamentos'));
    }

    public function updateStatus(Request $request, $id)
    {
        $agendamento = Scheduling::findOrFail($id);
        
        // Atualiza o status para 'Concluído'
        $agendamento->status = $request->input('status', 'Concluído');
        $agendamento->save();

        return redirect()->back()->with('success', 'Atendimento finalizado com sucesso!');
    }
}
