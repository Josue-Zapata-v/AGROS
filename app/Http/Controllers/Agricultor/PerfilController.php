<?php

namespace App\Http\Controllers\Agricultor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function edit()
    {
        $usuario = Auth::user();
        return view('agricultor.perfil', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
            'direccion_detallada' => 'required|string|max:255',
        ]);

        $usuario->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'departamento' => $request->departamento,
            'provincia' => $request->provincia,
            'distrito' => $request->distrito,
            'direccion_detallada' => $request->direccion_detallada,
        ]);

        // Verifica si ya tiene todos los campos obligatorios completos
        if (
            !empty($usuario->departamento) &&
            !empty($usuario->provincia) &&
            !empty($usuario->distrito) &&
            !empty($usuario->direccion_detallada)
        ) {
            return redirect()->route('agricultor.dashboard')->with('success', '✅ Perfil completo. Bienvenido al panel principal.');
        }

        return redirect()->route('agricultor.perfil')->with('success', 'Perfil actualizado parcialmente.');
    }

}
