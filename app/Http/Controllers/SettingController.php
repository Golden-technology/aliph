<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', compact('setting'));
    }

    public function update(Request $request , Setting $setting)
    {
        switch ($request->type) {
            case 'invoice_template':
                $setting->update(['invoice_template' => $request->invoice_template]);
                break;
        }

        return back()->with('success', translate('تمت العملية بنجاح'));
    }
}
