<?php

namespace Larsklopstra\Nebula\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Larsklopstra\Nebula\Contracts\NebulaPage;

class PageController
{
    public function index(Request $request, NebulaPage $page)
    {
        if ($page->canSeeCallback && !$page->canSeeCallback($request)) {
            throw new AuthorizationException;
        }

        return view('nebula::pages.index', [
            'page' => $page
        ]);
    }
}
