<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\User;

class SignUpTest extends TestCase
{
    /**
     * Prueba de visualizar ruta de registro de usuarios
     * @test
     * @return void
     */
    public function visualizar_signup_prueba()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * Prueba de registro de usuarios con información incorrecta
     * @test
     * @return void
     */
    public function registrar_usuario_credenciales_incorrectas_prueba(){
        $response = $this->post('/register', [
            'name' => Str::random(20),
            'last_name' => Str::random(30),
            'email' => Str::random(15),
            'password' => 'hola1234'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Prueba de registro de usuarios con cuenta duplicada
     * @test
     * @return void
     */
    public function registrar_usuario_cuenta_duplicada_prueba(){
        $user = User::factory()->create();
        $response = $this->post('/register', [
            'name' => Str::random(20),
            'last_name' => Str::random(30),
            'email' => $user->email,
            'password' => 'hola1234'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Prueba de registro de usuarios con información correcta y sin duplicidad de cuenta
     * @test
     * @return void
     */
    public function registrar_usuario_informacion_correcta_prueba(){
        $response = $this->post('/register', [
            'name' => Str::random(20),
            'last_name' => Str::random(30),
            'email' => Str::random(10) . '@test.com',
            'password' => 'hola12345',
            'password_confirmation' => 'hola12345'
        ]);
        $response->assertRedirect('/email/verify');
    }
}
