<?php namespace VaahCms\Modules\Orders\Tests\Browser;

use VaahCms\Modules\Orders\Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrderTest extends DuskTestCase
{
    /**
     * @group order
     */
    public function testCreateOrder()
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->maximize();
                $browser->visit('/admin')
                    ->waitForText('Email')
                    ->type('input[type=email]', env('ADMIN_EMAIL'))
                    ->type('input[type=password]', env('ADMIN_PASSWORD'))
                    ->press('.btn-brand-02')
                    ->waitForText('Dashboard')
                    ->visit('/admin/orders#/orders/create')
                    ->waitForText('Create Orders')
                    ->type('@order.addresses.customer.email', 'email@gmail.com')
                    ->type('#customer>@email', 'email@gmail.com')
                    ->pause(2000)
                    ->assertSee('VaahCms');
            });
        });
    }
}
