<?php

namespace Tests\Feature;

use App\Models\Customer;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     *
     * @return void
     */
    public function see_index()
    {
        $this->actingAs(User::factory()->create())
        ->get('/customers')
        ->assertStatus(200);
    }

    /**
     * @test
     *
     * @return void
     */
    public function create_customer()
    {
        $this->actingAs(User::factory()->create())
        ->post('/customers', Customer::factory()->create()->toArray())
        ->assertStatus(302);
    }

    /**
     * @test
     *
     * @return void
     */
    public function show_customer()
    {
        $this->actingAs(User::factory()->create())
        ->get('/customers' . '/' . Customer::factory()->create()->id)
        ->assertStatus(200);
    }

    /**
     * @test
     *
     * @return void
     */
    public function edit_customer()
    {
        $this->actingAs(User::factory()->create())
        ->get('/customers' . '/' . Customer::factory()->create()->id . '/edit' )
        ->assertStatus(200);
    }

    /**
     * @test
     *
     * @return void
     */
    public function update_customer()
    {
        $this->actingAs(User::factory()->create())
        ->put('/customers' . '/' . Customer::factory()->create()->id ,  Customer::factory()->create()->toArray)
        ->assertStatus(302);
    }
}
