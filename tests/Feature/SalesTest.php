<?php

use App\Models\User;

test('Halaman Sales ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman sales
    $response = $this->get('/sales');
    $response->assertStatus(200);
});

test('Halaman tambah Sales ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman create sales
    $response = $this->get('/sales/create');
    $response->assertStatus(200);
});

