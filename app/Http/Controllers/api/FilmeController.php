<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\FilmeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{

    // LISTAGEM DE FILMES

    public function index()
    {

        try {
            return Filme::all();
        }
            
         catch (Throwable $e) {
            return response()->json(['message' => 'Erro ocorrido na visualização'], 400);
        }

    }


    // CRIAÇÃO DE NOVOS FILMES

    public function store(FilmeRequest $request)
    {
        try {
            Filme::create($request->all());
            return response()->json(['message' => 'Sucesso na inserção'], 200);
        }
            
         catch (Throwable $e) {
            return response()->json(['message' => 'Erro ocorrido na inserção'], 400);
        }

    }


    // LISTAGEM DE FILME ESPECIFICO

    public function show($id)
    {
        try 
        {
            return Filme::findOrFail($id);
        } 
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }


    // ATUALIZAÇÃO DE DADOS DO FILME

    public function update(Request $request, $id)
    {
        try 
        {
            $filmeRequest = new FilmeRequest();
            $validacaoDados = $request->validate($filmeRequest->rules(), $filmeRequest->messages());

            $filme = Filme::findOrFail($id);
            $filme->update($request->all()); 
            return response()->json(['message' => 'Sucesso na atualização'], 200);
        }
            
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // EXCLUSÃO DE FILME ESPECIFICO

    public function destroy($id)
    {
        try {
            $filme = Filme::findOrFail($id);
            $filme->delete(); 
            return response()->json(['message' => 'Sucesso na exclusão'], 200);
        }
            
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
