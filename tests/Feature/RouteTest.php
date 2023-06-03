<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class RouteTest extends TestCase
{
    /**
     * Test that public routes return a 200 status code.
     *
     * @return void
     */
    public function test_public_routes_are_working()
    {
        $routes = [
            '/',
            '/contact_us',
            '/our_pastors',
            '/about_us',
            '/events',
            '/ministries',
            '/partner/donation',
            '/donation/join',
            '/donate',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test that protected routes can be accessed when authenticated.
     *
     * @return void
     */
    public function test_protected_routes_are_working()
    {
        $routes = [
            '/members/list',
            '/events/list',
            '/dashboard',
            '/members/departments',
            '/settings',
            '/partners/list',
            '/live/coverage/upload',
            '/donations/list',
        ];

        $user = User::factory()->create(); // Create a user for authentication

        foreach ($routes as $route) {
            $response = $this->actingAs($user)->get($route); // Authenticate the user
            $response->assertStatus(200);
        }
    }

    /**
     * Test that not logged-in users cannot access protected routes.
     *
     * @return void
     */
    public function test_not_logged_in_user_cannot_access_protected_routes()
    {
        $routes = [
            '/members/list',
            '/events/list',
            '/dashboard',
            '/members/departments',
            '/settings',
            '/partners/list',
            '/live/coverage/upload',
            '/donations/list',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(302); // Expecting a redirect (302) for not authenticated users
        }
    }
}
