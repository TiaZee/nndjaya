<?php

use App\Models\User;

test('Halaman Profile ditampilkan', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/profile');

    $response->assertOk();
});
