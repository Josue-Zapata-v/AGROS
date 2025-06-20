<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit'); // Asegúrate de crear esta vista luego
    }

    public function update(Request $request)
    {
        // lógica de actualización
        return back()->with('status', 'Perfil actualizado');
    }

    public function destroy(Request $request)
    {
        // lógica para eliminar la cuenta
        return redirect('/')->with('status', 'Cuenta eliminada');
    }
}
