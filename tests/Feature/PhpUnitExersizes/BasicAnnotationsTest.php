<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicAnnotationsTest extends TestCase
{
  public static $value = 0;

  /**
   * @before
   */
  public static function incrementThisValue()
  {    
    return self::$value++;    
  }  

  /**
   * @after
   */
  public function test_debug_output_to_cli() 
  {
    var_dump('annotations are working');
    ob_flush();
  }

  /**
   * @dataProvider emails_prodiver
   */
  public function test_valid_email($email)
  {
    $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $email);
  }

  public function test_assert_equals()
  {   
    $this->assertEquals(5, self::$value);
  }

  /**
   * @dataProvider numbers_provider
   */
  public function test_math($a, $b, $exepted)
  {
    $res = $a * $b;
    $this->assertEquals($exepted, $res);
  }  

  public function emails_prodiver()
  {
    return [
      ['dsds@ghfd.df'],
      ['test@test.com'],
      ['some@gmail.info'],
    ];
  }

  public function numbers_provider()
  {
    return [
      [1,2,2],
      [2,2,4],
      [3,3,9],
    ];
  }

}
