<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{

    use DatabaseTransactions;
    
    /** @test */
    public function login_esta_gerando_bearer_token()
    {
        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',])
            ->assertStatus(200);
    }

    /** @test */
    public function alterar_senha_usuario()
    {
        $response = $this->json('PUT', 'api/novasenha/1', ['senha' => 'teste_alteracao'], ['X-Pontue-Key' => env('PONTUE_KEY')])
            ->assertStatus(200);
    }

    /** @test */
    public function criar_novo_usuario()
    {
        $response = $this->json('POST', 'api/novousuario', ['nome' => 'Teste', 'email' => 'teste@gmail.com', 'senha' => 'teste'], ['X-Pontue-Key' => env('PONTUE_KEY')])
            ->assertStatus(201);
    }

    // ** CARROS **

    /** @test */
    public function listagem_de_carros()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('GET', 'api/carros', [], ['Bearer Token' => $token])
            ->assertStatus(200);
    }




    /** @test */
    public function listagem_de_carro_especifico()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('GET', 'api/carros/1', [], ['Bearer Token' => $token])
            ->assertStatus(200);
    }
    

    /** @test */
    public function editar_carro_especifico()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('DELETE', 'api/carros/1', [], ['Bearer Token' => $token])
            ->assertStatus(200);
    }

    /** @test */
    public function exclusao_carro_especifico()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('PUT', 'api/carros/1', ['modelo' => 'Teste', 'marca'=> 'Teste', 'ano_modelo' => 0000], ['Bearer Token' => $token])
            ->assertStatus(200);
    }

    // ** FILMES **

    public function listagem_de_filmes()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('GET', 'api/filmes', [], ['Bearer Token' => $token])
            ->assertStatus(200);
    }




    /** @test */
    public function listagem_de_filme_especifico()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('GET', 'api/filmes/1', [], ['Bearer Token' => $token])
            ->assertStatus(200);
    }
    

    /** @test */
    public function editar_filme_especifico()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('DELETE', 'api/filmes/1', [], ['Bearer Token' => $token])
            ->assertStatus(200);
    }

    /** @test */
    public function exclusao_filme_especifico()
    {

        $response = $this->postJson('api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',]);
        
        $token = $response->decodeResponseJson()[0];

        $response = $this->json('PUT', 'api/filmes/1', ['nome' => 'Teste', 'ano' => 2001], ['Bearer Token' => $token])
            ->assertStatus(200);
    }


    
}
