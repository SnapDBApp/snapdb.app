<?php

it('can open contact page')
    ->get('/contact')
    ->assertOk();
