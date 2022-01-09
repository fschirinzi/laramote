<?php

namespace Fschirinzi\LaraMote\Tests\Unit;


use Fschirinzi\LaraMote\LaraMoteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [LaraMoteServiceProvider::class];
    }

    /**
     * @test
     * @environment-setup setUpTestingEnvironment
     */
    public function it_exposes_routes_in_testing()
    {
        $this->routeNames()->each(
            fn($name) => $this->assertTrue(Route::has($name))
        );
    }

    /**
     * @test
     * @environment-setup setUpProductionEnvironment
     */
    public function it_does_not_expose_routes_in_production()
    {
        $this->routeNames()->each(
            fn($name) => $this->assertFalse(Route::has($name))
        );
    }

    protected function routeNames(){
        return collect([
            'laramote.artisan',
            'laramote.login',
            'laramote.factory',
            'laramote.model',
        ]);
    }

    protected function setUpTestingEnvironment()
    {
        app()->detectEnvironment(fn() => 'testing');
    }

    protected function setUpProductionEnvironment()
    {
        app()->detectEnvironment(fn() => 'production');
    }
}
