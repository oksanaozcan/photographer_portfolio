<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Log;
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

  public function test_contact_route_assert()
  {
    $response = $this->get('/contacts');
    $response->assertSee('Или оставьте заявку:');
    $response->assertViewIs('contact.index');
    $response->assertStatus(200);    
  }

  public function test_gallery_route_assert()
  {
    $response = $this->get('/gallery');    
    $response->assertViewIs('gallery.index');
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

  public function test_admin_route_auth_work()
  {
    $user = User::find(1);
    $response = $this->actingAs($user)->get('/admin');
    $response->assertOk();  
  }

  public function test_auth_middleware_is_working()
  { 
    $response = $this->get('/admin/theme');
    $response->assertRedirect('/login');
  }

  public function test_status_404_exception()
  {
    $this->get('/h')->assertStatus(404);
    $this->get('/theme')->assertStatus(404);
    $this->get('/order')->assertStatus(404);   
  }
  
}
