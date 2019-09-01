<?php

namespace App\Http\Controllers\Api\V1\Messaging;

use App\Models\Gammu\Outbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return response()->json(['pending' => Outbox::orderBy('ID', 'DESC')->paginate(5)]);
    }
}
