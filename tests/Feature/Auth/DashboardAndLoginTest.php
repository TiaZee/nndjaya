<?php

use App\Models\User;

test('Halaman Login ditampilkan', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('Halaman Dashboard ditampilkan', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
