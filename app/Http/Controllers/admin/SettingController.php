<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings form.
     */
    public function index()
    {
        $settings = Setting::all(); // Lấy toàn bộ cài đặt
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        // $request->validate([
        //     'image' => 'nullable|image|max:2048', // Validate file hình ảnh
        //     'address' => 'nullable|string|max:255',
        //     'phone' => 'nullable|string|max:20',
        //     'google_map' => 'nullable|string|max:255|url',
        // ]);

        // Cập nhật từng setting
        foreach ($request->except('_token') as $key => $value) {
            if ($key === 'image' && $request->hasFile('image')) {
                $filePath = $request->file('image')->store('uploads/settings', 'public');
                Setting::updateOrCreate(['key' => $key], ['value' => $filePath]);
            } else {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect()->route('quantri.settings.index')->with('success', 'Cập nhật cài đặt thành công!');
    }
}
