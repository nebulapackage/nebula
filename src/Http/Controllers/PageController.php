<?php

namespace Larsklopstra\Nebula\Http\Controllers;

use Larsklopstra\Nebula\Contracts\NebulaPage;

class PageController
{
    public function index(NebulaPage $page)
    {
        return view('nebula::pages.index', [
            'page' => $page,
        ]);
    }
}
