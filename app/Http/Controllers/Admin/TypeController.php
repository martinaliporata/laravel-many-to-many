<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(20);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // così è a mano, sennò c'è altro modo come al solito
        $data = $request->validate([
        'name'=> "required|string|min:3|max:30|unique:types",
        'colour'=>"required|hex_color"
        ]);
        $type = Type::create($data);
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Display the specified resource.
     */
    // con dependency
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate(["
        'name"=> "string|min:3|max:30|unique:types",
        'colour'=>"required|hex_color"]
        );

        $type->update($data);
        return redirect()->route('admin.projects.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.projects.index');
    }
}
