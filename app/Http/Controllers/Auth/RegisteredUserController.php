<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        session()->flash('tab', 'register');
        return view('auth.unificado');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'digits:9'], // Exactamente 9 dígitos
            'direccion' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:agricultor,comprador,transportista'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'direccion' => $request->direccion,
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        switch ($user->role) {
            case 'agricultor':
                return redirect()->route('agricultor.dashboard');
            case 'comprador':
                return redirect()->route('comprador.dashboard');
            case 'transportista':
                return redirect()->route('transportista.dashboard');
            default:
                Auth::logout();
                return redirect()->route('register')->withErrors(['role' => 'Rol no válido.'])->withInput()->with('tab', 'register');
        }
    }
}
