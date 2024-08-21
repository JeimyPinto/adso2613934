<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = $request->file('image')->getClientOriginalName();

            // Define la ruta de destino
            $destinationPath = public_path('images/categories');

            // Mueve el archivo a la ruta de destino
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = 'categorie03.png';
        }
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $photoName;
        $category->releasedate = $request->releasedate;
        $category->save();

        if($category->save()){
            return redirect('categories')->with('message', 'La categoría fue creada con éxito');
        }

        return redirect('categories')->with('message', 'No se pudo crear la categoría');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function search(Request $request)
    {
        $categories = Category::names($request->name)->paginate(3);
        return view('categories.index')->with('categories', $categories);
    }
}
