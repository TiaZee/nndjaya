<?php

test('Halaman Landing Page ditampilkan', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});
