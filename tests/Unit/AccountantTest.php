<?php

namespace Tests\Unit;

use App\Http\Controllers\AccountantController;
use PHPUnit\Framework\TestCase;

class AccountantTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_find_profit()
    {
        $profit = AccountantController::findProfit(100);
        $this->assertEquals(10, $profit);
    }
}
