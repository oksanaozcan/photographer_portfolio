<?php

namespace Tests\Feature\PhpUnitExersizes;

use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ErrorsExceptionsTest extends TestCase
{
  public function test_error_can_be_expected(): void
  {
    // $this->expectError();
    $this->expectErrorMessage('foo');
    // \trigger_error('foo', \E_USER_ERROR);
    // $file = fopen("test.txt", "r");
    throw new Exception('foo');
  }
}
