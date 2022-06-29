<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependenciesTest extends TestCase
{
  private $value;

  public function test_first (): int
  {
    $this->value = 1;
    $this->assertEquals(1, $this->value);
    return $this->value;
  }

  /**
   * @depends test_first
   */

  public function test_dependency_1($value): int
  {
    $value++;
    $expected = 2;    

    $this->assertEquals($expected, $value);

    return $value;
  }

  /**
   * @depends test_dependency_1
   */
  public function test_dependency_2($value): void
  {
    $value++;
    $expected = 3;
    $this->assertEquals($expected, $value);
  }

}
