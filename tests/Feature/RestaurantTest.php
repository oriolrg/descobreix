<?php

namespace Tests\Feature;

use App\Restaurants;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $restaurant = new Restaurants(['nom'=>'Tesla']);
        $this->assertEquals('Tesla', $restaurant->nom);
    }
}
