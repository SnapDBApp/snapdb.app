<?php

it('can open the page', function () {
    $this->get('/downloads')
        ->assertOk();
});
