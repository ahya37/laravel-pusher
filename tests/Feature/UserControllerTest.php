<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
             ->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post('/login',[
            "user" => "ahya",
            "password" => "rahasia"
        ])->assertRedirect("/")
            ->assertSessionHas("user","ahya");
    }

    public function testLoginValidationError()
    {
        $this->post('/login',[])
             ->assertSeeText("User or password is required");
    }
}
