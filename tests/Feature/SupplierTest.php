<?php

use App\Models\User;

test('Halaman Supplier ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman suppliers
    $response = $this->get('/suppliers');
    $response->assertStatus(200);
});

test('Halaman tambah Supplier ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman create suppliers
    $response = $this->get('/suppliers/create');
    $response->assertStatus(200);
});
