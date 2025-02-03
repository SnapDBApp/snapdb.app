<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;
use TiMacDonald\Log\LogFake;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // todo: temporarily enabled http requests, because the
        // turnstile package needs to make a request to cloudflare
        //        Http::preventStrayRequests();
        LogFake::bind();
    }
}
