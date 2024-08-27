<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TddControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_register_view(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);

        $response->assertViewIs('register');
    }

    public function test_login_failed(): void
    {
        $response = $this->post(route('check'), []);

        $response->assertStatus(302);

        $response->assertCookieNotExpired('error');
    }

    public function test_login_and_register_successful()
    {
        $response1 = $this->post(route('store'), [
            'email' => 'mojtabazfr5@gmail.com',
            'password' => '2222'
        ]);

        $response1->assertRedirect(route('login'));

        $response2 = $this->post(route('check'), [
            'email' => 'mojtabazfr5@gmail.com',
            'password' => '2222'
        ]);

        $response2->assertRedirect(route('welcome'));
    }
}
