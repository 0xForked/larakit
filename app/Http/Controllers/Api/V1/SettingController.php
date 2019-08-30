<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
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
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->key] = $setting->value;
        }
        $data = (Object)$data;
        return response()->json(['settings' => $data]);
    }

    public function update(Request $request)
    {
        Setting::updateOrCreate(
            ['key' => 'autoreplay_status'],
            ['key' => 'autoreplay_status', 'value' => $request->status]
        );
        Setting::updateOrCreate(
            ['key' => 'autoreplay_message'],
            ['key' => 'autoreplay_message', 'value' => $request->message]
        );
        return response()->json([
            'type' => 'success',
            'message' => 'success update setting'
        ]);
    }
}

