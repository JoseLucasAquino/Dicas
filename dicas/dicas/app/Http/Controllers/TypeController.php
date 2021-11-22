<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $title = 'Tipos de Véiculos';
        return view('tables.types', compact('types', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = Route('types.store');
        $title = 'Cadastro de Tipos';
        return view('forms.types', compact('action', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|unique:types',
        ]);

        Type::create($request->all());
        return redirect()->route('type.index')->with('success', 'Tipo cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Tipo de Véiculo';
        $type = Type::find($id);
        return view('records.type', compact('title','type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'put';
        $type = Type::find($id);
        $action = Route('types.update', $type);
        $title = 'Cadastro de Tipo de Veículo';
        return view('forms.type', compact('method', 'action', 'title', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $request->validate([
            'description' => '|required|',
        ]);

        $type->update($request->all());

        return redirect()->route('type.index')->with('success', 'Cadastro de tipo de veículo atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        return redirect()->route('type.index')->with('success', 'Os dados do tipo de veículo foram excluídos com sucesso.');
    }
}
