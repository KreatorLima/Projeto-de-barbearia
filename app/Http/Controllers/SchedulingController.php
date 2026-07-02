<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheduling; // Certifique-se de que o Model está importado aqui!

class SchedulingController extends Controller
{
    // Exibe a página com a tabela de horários
    public function index()
    {
        // Busca todos os agendamentos do banco para marcar como "Ocupado" na tabela
        $agendamentos = Scheduling::orderBy('date', 'asc')->get(); 
        
        // Retorna a view injetando a variável $agendamentos
        return view('scheduling.agendamento', compact('agendamentos'));
    }

    // Salva o agendamento no Banco de Dados
    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|string',
            'barber'  => 'required|string',
            'date'    => 'required|date',
            'time'    => 'required',
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string',
            'notes'   => 'nullable|string',
        ]);

        Scheduling::create([
            'user_id' => auth()->id(), 
            'service' => $request->service,
            'barber'  => $request->barber,
            'date'    => $request->date,
            'time'    => $request->time,
            'name'    => $request->name,
            'phone'   => $request->phone,
            'notes'   => $request->notes,
        ]);

        return redirect()->route('scheduling.index')->with('success', 'Agendamento realizado com sucesso!');
    }
}