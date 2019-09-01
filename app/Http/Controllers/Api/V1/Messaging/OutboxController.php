<?php

namespace App\Http\Controllers\Api\V1\Messaging;

use App\Traits\GammuMessage;
use Illuminate\Http\Request;
use App\Models\Gammu\SentItem;
use App\Http\Controllers\Controller;

class OutboxController extends Controller
{

    use GammuMessage;

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
        return response()->json(['outbox' => SentItem::orderBy('ID', 'DESC')->paginate(5)]);
    }

    public function store(Request $request)
    {
        $this->performSendMessage($request->phone, $request->message);
        return response()->json([
            'type' => 'success',
            'message' => 'New message on pending list'
        ]);
    }
}
