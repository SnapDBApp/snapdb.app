<?php

it('can access the landing page', function () {
    $this->get('/')
        ->assertOk();
});

it('cannot purchase lifetime when paddle purchases are disabled', function () {
    config(['paddle.accept_purchases' => false]);

    $this->get('/')
        ->assertSeeHtml('btn-paddle-disabled');
});

it('can purchase lifetime', function () {
    config(['paddle.accept_purchases' => true]);

    $this->get('/')
        ->assertDontSeeHtml('btn-paddle-disabled')
        ->assertSee('Purchase')
        ->assertSeeHtml('Paddle.Checkout.open');
});
