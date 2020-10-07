<?php

namespace Fschirinzi\LaraMote\Tests;

use Orchestra\Testbench\TestCase;
use Fschirinzi\LaraMote\LaraMoteServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaraMoteServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
