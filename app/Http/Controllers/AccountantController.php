<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function findProfit($amount)
    {
        $profitPercent = 10;
        return $amount * $profitPercent / 100;
    }
}
