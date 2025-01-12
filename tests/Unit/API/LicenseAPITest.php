<?php

it('can access the api', function () {
    $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->get('/api')->assertOk();
});

it('is rate limited', function () {
    $maxPerMinute = 30;

    for ($i = 0; $i < $maxPerMinute; $i++) {
        $this->withHeaders([
            'SnapDB-License-Client' => 1,
        ])->get('/api/license')->assertOk();
    }

    $this->withHeaders([
        'SnapDB-License-Client' => 1,
    ])->get('/api/license')->assertStatus(429);
});
