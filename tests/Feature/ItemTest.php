<?php
use App\Models\User;

test('Halaman Item ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    //arahkan permintaan ke halaman item
    $response = $this->get('/items');
    $response->assertStatus(200);
});

test('Halaman tambah Item ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    //arahkan permintaan ke halaman create item
    $response = $this->get('/items/create');
    $response->assertStatus(200);
});
