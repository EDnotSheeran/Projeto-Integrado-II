<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $events = Event::where([['status', '=', true], ['date', '>=', DB::raw('NOW()')], ['name', 'like', '%' . $request->search . '%']])->orderBy('date', 'desc')->paginate(10, ['*'], 'page', $page);
        $page_count = ceil($events->total() / $events->perPage());
        return View('home', compact('events', 'page', 'page_count'));
    }
}
