<?php

namespace Tests\Feature;

use App\Models\kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    // Unit test
    public function test_example()
    {
        $response = kategori::create([
            'nama'=>'Robusta'
        ]);

        $this->assertTrue(true);
    }
}
