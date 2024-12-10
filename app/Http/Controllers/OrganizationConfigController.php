<?php

namespace App\Http\Controllers;

use App\Models\OrganizationConfig;
use Illuminate\Http\Request;

class OrganizationConfigController extends Controller
{
    public function showConfig()
    {
        $config = OrganizationConfig::first();
        return view('pages.config', compact('config'));
    }

    public function updateConfig(Request $request)
    {
        $request->validate([
            'slogan' => 'nullable|string|max:255',
            'icon_path' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'representative' => 'nullable|string',
            'main_proposals' => 'nullable|array',
            'footer_text' => 'nullable|string',
            'social_icons' => 'nullable|array',
            'contact_info' => 'nullable|array',
        ]);

        $data = $request->only([
            'slogan',
            'icon_path',
            'mission',
            'vision',
            'representative',
            'main_proposals',
            'footer_text',
            'social_icons',
            'contact_info'
        ]);

        $config = OrganizationConfig::firstOrCreate([]);
        $config->update($data);

        return redirect()->back()->with('success', 'Configuración actualizada con éxito.');
    }
}
