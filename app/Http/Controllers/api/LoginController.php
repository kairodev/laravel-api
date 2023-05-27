<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    // RETORNA O TOKEN DA ROTA LOGIN
    public function obterToken(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();
            $token = $user->createToken('JWT');
    
            return response()->json($token->plainTextToken, 200);
        }
    
        return response()->json('Usuario inválido', 401);

    }


    // ALTERA SENHA DO USUARIO
    public function novaSenha($id, Request $request){
        
        $usuario = User::findOrFail($id);
        $novaSenha = $request->senha;
        $usuario->password = Hash::make($novaSenha);
        $usuario->save();

        return response()->json([
            'retorno' => 'Senha atualizada com sucesso.'
        ], 200);

    }

    // CRIAR NOVO USUARIO
    public function novoUsuario(Request $request){
        
        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make($request->senha);
        // ...
        $user->save();

        return response()->json([
            'retorno' => 'Usuário criado com sucesso.'
        ], 201);

    }

    
}
