<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class LoginTest extends TestCase
{
    /**
     * Prueba de visualizar ruta de inicio de sesión 
     * @test 
     * @return void
     */
    public function visualizar_login_prueba()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Prueba de inicio de sesión con información incorrecta
     * @test
     * @return void
     */
    public function iniciar_sesion_credenciales_incorrectas_prueba(){
        $response = $this->post('/login', [
            'email' => 'juancarlos123@@.com',
            'password' => 'hola1234'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Prueba de inicio de sesión con correo electrónico correcto y contraseña incorrecta
     * @test
     * @return void
     */
    public function iniciar_sesion_contrasena_incorrecta_prueba(){
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'hola1234'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Prueba de inicio de sesión con credenciales correctas
     * @test
     * @return void
     */
    public function iniciar_sesion_credenciales_correctas_prueba(){
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response->assertRedirect('/home');
    }
}
