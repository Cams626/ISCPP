<?php

use App\Models\User;
use App\Models\SCFirewall;

test('guests are redirected to the login page for scfirewalls', function () {
    $response = $this->get('/scfirewalls');
    $response->assertRedirect('/login');
});

test('authenticated users can visit the scfirewalls index page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/scfirewalls');
    $response->assertStatus(200);
});