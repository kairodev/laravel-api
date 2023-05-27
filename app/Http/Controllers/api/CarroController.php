<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\CarroRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    

    // LISTAGEM DE CARROS

    public function index()
    {

        try {
            return Carro::all();
        }
            
         catch (Throwable $e) {
            return response()->json(['message' => 'Erro ocorrido na visualização'], 400);
        }
        
    }


    // CRIAÇÃO DE NOVOS CARROS

    public function store(CarroRequest $request)
    {
        try {
            Carro::create($request->all()); 
            return response()->json(['message' => 'Sucesso na inserção'], 200);
        }
            
         catch (Throwable $e) {
            return response()->json(['message' => 'Erro ocorrido na inserção'], 400);
        }
            
    }


    // LISTAGEM DE CARRO ESPECIFICO

    public function show($id)
    {

        try 
        {
            return Carro::findOrFail($id);
        } 
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        
    }


    // ATUALIZAÇÃO DE DADOS DE CARROS

    public function update(Request $request, $id)
    {

        try 
        {
            $carroRequest = new CarroRequest();
            $validacaoDados = $request->validate($carroRequest->rules(), $carroRequest->messages());

            $carro = Carro::findOrFail($id);
            $carro->update($request->all()); 
            return response()->json(['message' => 'Sucesso na atualização'], 200);
        }
            
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
        
    }

    // EXCLUSÃO DE CARRO ESPECIFICO

    public function destroy($id)
    {
        
        try {
            $carro = Carro::findOrFail($id);
            $carro->delete(); 
            return response()->json(['message' => 'Sucesso na exclusão'], 200);
        }
            
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

    }
}
