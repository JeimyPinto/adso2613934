<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLoged = Auth::user();
        $users = User::paginate(4);
        return view('users.index')->with('users', $users)->with('userLoged', $userLoged);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
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
        $user = new User();
        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = $photoName;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($user->save()) {
            return redirect('users')->with('message', 'Usuario ' . $user->fullname . ' creado con éxito');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Manejar la subida de la foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $destinationPath = public_path('images/profile');
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = $request->originphoto;
        }

        // Asignar los valores del formulario al usuario
        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = $photoName;
        $user->phone = $request->phone;
        $user->email = $request->email;

        // Guardar los cambios en el usuario
        if ($user->save()) {
            return redirect('users')->with('message', 'Usuario ' . $user->fullname . ' modificado con éxito');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('users')->with('message', 'Usuario ' . $user->fullname . ' eliminado con éxito');
        }
    }
}
