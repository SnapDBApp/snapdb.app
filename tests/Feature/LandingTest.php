<?php

it('can access the landing page', function () {
    $this->get('/')
        ->assertOk();
});
