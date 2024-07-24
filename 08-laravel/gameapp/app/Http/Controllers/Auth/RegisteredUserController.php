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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'gender' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'file'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $request->file('photo')->getClientOriginalName();

            // Define la ruta de destino
            $destinationPath = public_path('images/profile');

            // Mueve el archivo a la ruta de destino
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = 'no-photo.png';
        }
        $user = User::create([
            'fullname' => $request->fullname,
            'document' => $request->document,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'photo' => $photoName,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
