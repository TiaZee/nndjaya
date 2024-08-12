<?php
use App\Models\User;

test('Halaman Restock ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // arahkan permintaan ke restocks
    $response = $this->get('/restocks');
    $response->assertStatus(200);
});

test('Halaman tambah Restock ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman create restocks
    $response = $this->get('/restocks/create');
    $response->assertStatus(200);
});


