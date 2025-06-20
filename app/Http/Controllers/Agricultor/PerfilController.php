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
            'direccion' => 'nullable|string|max:255',
        ]);

        $usuario->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('agricultor.perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
