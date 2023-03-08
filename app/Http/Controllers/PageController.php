<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $page = 'home'): Response
    {
        $view = 'page.' . $page;

        if(!view()->exists($view)){
            abort(404);
        }

        return response()->view($view, [
            'title' => ucfirst($page)
        ]);
    }
}
