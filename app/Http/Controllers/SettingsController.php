<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // public function index()
    // {
    //     $setting = Setting::first(); // Retrieve the first setting record

    //     if (!$setting) {
    //         $setting = new Setting(); // Create a default setting if none exists
    //     }

    //     return view('settings.index', compact('setting'));
    // }

    public function update(Request $request)
    {
        $request->validate([
            'primary_color' => 'required|string|max:7', // Max 7 characters (e.g., #RRGGBB)
        ]);

        $setting = Setting::firstOrCreate([]); // Retrieve or create the first setting record
        $setting->background_color = $request->background_color;
        $setting->save();

        return redirect()->back()->with('success', 'Background color updated successfully.');
    }
}
