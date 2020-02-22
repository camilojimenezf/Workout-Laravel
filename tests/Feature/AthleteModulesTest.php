<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AthleteModulesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function testExample()
    {
       // $response = $this->get('/');

        //$response->assertStatus(200);
        $this->get('/athletes')
            ->assertStatus(200)
            ->assertSee('athletes');
    }
   /* @test */
    function it_loads_athletes_details(){
        $this->get('/athletes/5')
        ->assertStatus(200)
        ->assertSee("view details of the athletes five");
    }
}
