<?php
use App\Models\User;

test('Halaman User ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman users
    $response = $this->get('/users');
    $response->assertStatus(200);
});

test('Halaman tambah User ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // // Simulasi permintaan ke halaman create users
    $response = $this->get('/users/create');
    $response->assertStatus(200);
});

