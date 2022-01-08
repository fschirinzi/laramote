<?php

namespace Fschirinzi\LaraMote\Tests\Unit;


use Fschirinzi\LaraMote\LaraMoteServiceProvider;

class ConfigurationTest extends \Fschirinzi\LaraMote\Tests\TestCase
{
    /** @test */
    public function middleware_is_an_array()
    {
        $this->assertIsArray(\Config::get('laramote.middleware'));
    }
}
