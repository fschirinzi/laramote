<?php

namespace Fschirinzi\LaraMote\Tests\Unit;

class ConfigurationTest extends \Fschirinzi\LaraMote\Tests\TestCase
{
    /** @test */
    public function middleware_is_an_array()
    {
        $this->assertIsArray(config('laramote.middleware'));
    }
}
