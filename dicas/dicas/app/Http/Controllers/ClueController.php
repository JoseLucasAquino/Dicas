<?php

namespace App\Http\Controllers;

use App\Models\Clue;
use Illuminate\Http\Request;

class ClueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clues = Clue::all();
        $title = 'Lista de Dicas';
        return view('tables.clues', compact('clues', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = Route('clues.store');
        $title = 'Cadastro de Dica';
        return view('forms.clues', compact('action', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Brand::create($request->all());
        return redirect()->route('brands.index')->with('success', 'Marca cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        $title = 'Informações da Dica';
        return view('records.clue', compact('title', 'clue'));
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
        $clue = Clue::find($id);
        $action = Route('clues.update', $clue);
        $title = 'Cadastro de Dica';
        return view('forms.clue', compact('method', 'action', 'title', 'clue'));
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
        $clue = Clue::find($id);
        $clue->update($request->all());
        return redirect()->route('clues.index')->with('success', 'Cadastro de dica atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clue = Clue::find($id);
        $clue->delete();
        return redirect()->route('clue.index')->with('success', 'Os dados da dica foram excluídos com sucesso.');
    }
}
