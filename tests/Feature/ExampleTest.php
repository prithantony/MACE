<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_site_and_admin_dashboard_render(): void
    {
        $this->seed();

        $this->get('/')->assertStatus(200)->assertSee('Makeni College');
        $this->get('/programmes')->assertStatus(200)->assertSee('PRIMARY TEACHERS DIPLOMA');
        $this->get('/student-portal')->assertStatus(200)->assertSee('Username or email');
        $this->get('/admin')->assertStatus(200)->assertSee('CMS Dashboard');
    }
}
