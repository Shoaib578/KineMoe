<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        // You can pass subscription data to the view if needed
        return view('subscriptions.index');
    }
}
