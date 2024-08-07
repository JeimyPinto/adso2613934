<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $userLoged = Auth::user();
        $users = User::paginate(4);
        return view('users.index')->with('users', $users)->with('userLoged', $userLoged);
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\UserRequest $request
     * @return mixed|\Illuminate\Http\RedirectResponse
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

        // Add a return statement here
        return redirect('users')->with('message', 'Error al crear el usuario');
    }

    /**
     * Summary of show
     * @param \App\Models\User $user
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Summary of edit
     * @param \App\Models\User $user
     * @return mixed|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\UserRequest $request
     * @param \App\Models\User $user
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        // Manejar la subida de la foto
        if ($request->hasFile('photo')) {
            // Obtener la ruta de la foto actual
            $currentPhotoPath = public_path('images/profile/' . $user->photo);

            // Verificar si la foto actual existe y eliminarla
            if (file_exists($currentPhotoPath)) {
                unlink($currentPhotoPath);
            }

            // Subir la nueva foto
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
        $user->role = $request->role;

        // Guardar los cambios en el usuario
        if ($user->save()) {
            return redirect('users')->with('message', 'Usuario ' . $user->fullname . ' modificado con éxito');
        }

        // Add a return statement here
        return redirect('users')->with('message', 'Error al modificar el usuario');
    }


    /**
     * Summary of destroy
     * @param \App\Models\User $user
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('users')->with('message', 'Usuario ' . $user->fullname . ' eliminado con éxito');
        }

        // Add a return statement here
        return redirect('users')->with('message', 'Error al eliminar el usuario');
    }

    /**
     * Summary of search
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $users = User::names($request->q)->paginate(4);
        return view('users.search')->with('users', $users);
    }

    public function pdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('users.pdf', compact('users'));
        return $pdf->setPaper('a4', 'landscape')->download('allusers.pdf');
    }

    public function excel()
    {
        return Excel::download(new UserExport, 'allusers.xlsx');
    }
}
