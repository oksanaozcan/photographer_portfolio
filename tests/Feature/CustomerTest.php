<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
  public function test_model_exists()
  {
  $customer = Customer::factory()->create();
  $this->assertModelExists($customer);
  }

  public function test_model_can_be_soft_deleted()
  {
  $customer = Customer::factory()->create();
  $customer->delete();
  $this->assertSoftDeleted($customer);
  }
}
