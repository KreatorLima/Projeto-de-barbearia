<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Scheduling;
use App\Models\User;

class DashboardController extends Controller
{
    // Rota centralizada para onde o login aponta junto com a atualização do last_activity
    public function redirect(Request $request)
    {
        $request->user()->update([
            'last_activity' => now()
        ]);

        $role = $request->user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'manager' => redirect()->route('manager.dashboard'),
            'client' => redirect()->route('client.dashboard'),
            default => redirect()->route('client.dashboard'),
        };
    }

    public function clientIndex() {
        return view('dashboards.client');
    }

    public function managerIndex()
    {
        $agendamentos = Scheduling::where('barber', auth()->user()->name)
            ->Where('date', today())
            ->orderBy('time')
            ->get();

        return view('dashboards.manager', compact('agendamentos'));
    }

    public function adminIndex()
    {

        $agendamentos = Scheduling::whereDate('date', today())->get();
        $agendamentosConcluidos = Scheduling::whereDate('date', today())->where('status', 'concluido')->get();
        $semana = Scheduling::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->where('status', 'concluido')->get();
        $agendamentosMensais = Scheduling::whereMonth('date', now()->month)->get(); // Agendamentos do mês atual

        $barbeirosAtivos = User::where('role', 'manager')
            ->where('last_activity', '>=', now()->subMinutes(5))
            ->count();

        $barbeirosTotal = User::where('role', 'manager')->count();

        return view('dashboards.admin', compact(
            'agendamentos',
            'agendamentosMensais',
            'agendamentosConcluidos',
            'semana',
            'barbeirosAtivos',
            'barbeirosTotal'
        ));
    }
}