<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class NotifyBotController extends Controller
{
    /**
     * Show the scheduled notifications.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return Inertia::render('NotifyBot');
    }
}
