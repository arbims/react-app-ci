<?php

namespace App\Controllers;

use Inertia\Inertia;

class HomeController extends BaseController
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'name' => 'test'
        ]);
    }

    public function demo()
    {
        return Inertia::render('Home/Demo', [

        ]);
    }

}
