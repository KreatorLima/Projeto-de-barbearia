<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Rota centralizada para onde o login aponta
    public function redirect(Request $request)
    {
        $role = $request->user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'manager' => redirect()->route('manager.dashboard'), //redirecionamento conforme o usuário for logaod admin/client/manager
            'client' => redirect()->route('client.dashboard'),
            default => redirect()->route('client.dashboard'),
        };
    }

    public function clientIndex() {
        return view('dashboards.client');
    }

    public function managerIndex() {
        return view('dashboards.manager');
    }

    public function adminIndex() {
        return view('dashboards.admin');
    }
}