<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
use Illuminate\Support\Str;

class RoutesTest extends TestCase
{
  public function test_main_route_assert()
  {
    $response = $this->get('/');
    $response->assertSee('Профессиональный фотограф');
    $response->assertViewIs('index');
    $response->assertStatus(200);
  }

  public function test_assert_redirect_from_register_to_main_route()
  {
    $response = $this->get('/register');
    $response->assertRedirect('/');
  }

  public function test_assert_redirect_from_admin_to_login()
  {
    $response = $this->get('/admin');
    $response->assertRedirect('/login');
  }

  public function test_assert_login_route()
  {
    $response = $this->get('/login');
    $response->assertStatus(200);
  }  
  
}
