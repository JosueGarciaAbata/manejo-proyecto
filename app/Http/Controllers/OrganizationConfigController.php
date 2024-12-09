<?php

namespace App\Http\Controllers;

use App\Models\OrganizationConfig;
use Illuminate\Http\Request;

class OrganizationConfigController extends Controller
{
    public function showConfig()
    {
        $config = OrganizationConfig::first(); 
        return view('organization.config', compact('pages.organization'));
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

        $config = OrganizationConfig::first();

        $config->update($request->all());

        return redirect()->back()->with('success', 'Configuración actualizada con éxito.');
    }
}
