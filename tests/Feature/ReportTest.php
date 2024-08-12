<?php

use App\Models\User;


test('Halaman User ditampilkan', function () {
    // Buat user dan login
    $user = User::factory()->create();

    // Login ke aplikasi
    $this->actingAs($user);

    // Simulasi permintaan ke halaman users
    $response = $this->get('/report');
    $response->assertStatus(200);
});
