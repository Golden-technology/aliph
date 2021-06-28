<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     *
     * @return void
     */
    public function see_dashboard()
    {
        $this->actingAs(User::factory()->create())
        ->get('/')
        ->assertStatus(200);
    }
}
