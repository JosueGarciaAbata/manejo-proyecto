<?php

namespace App\Http\Controllers;

use App\Models\OrganizationConfig;
use App\Models\OrganizationContactDetail;
use App\Models\OrganizationSocialLink;
use App\Models\Proposal;
use Illuminate\Http\Request;

class OrganizationConfigController extends Controller
{
    public function showConfig()
    {
        $config = OrganizationConfig::with(['socialLinks', 'contactDetails'])->first();
        $proposals = Proposal::where('visible', 1)->get();
    
        return view('pages.config', compact('config', 'proposals'));
    }

    public function updateConfig(Request $request)
    {
        $request->validate([
            'slogan' => 'nullable|string|max:255',
            'icon_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'representative' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'main_proposals' => 'nullable|array',
            'footer_text' => 'nullable|string',
            'social_links' => 'nullable|array',
            'contact_details' => 'nullable|array',
        ]);

        $config = OrganizationConfig::firstOrCreate([]);

        // Actualización de archivos
        if ($request->hasFile('icon_path')) {
            $config->icon_path = $request->file('icon_path')->store('organization/icons', 'public');
        }
        if ($request->hasFile('representative')) {
            $config->representative = $request->file('representative')->store('organization/representatives', 'public');
        }

        // Actualización de campos básicos
        $config->update($request->except(['icon_path', 'representative', 'social_links', 'contact_details']));

        // Actualización de redes sociales
        if ($request->has('social_links')) {
            $config->socialLinks()->delete();
            foreach ($request->social_links as $link) {
                OrganizationSocialLink::create([
                    'organization_config_id' => $config->id,
                    'platform' => $link['platform'],
                    'url' => $link['url'],
                ]);
            }
        }

        // Actualización de contactos
        if ($request->has('contact_details')) {
            $config->contactDetails()->delete();
            foreach ($request->contact_details as $detail) {
                OrganizationContactDetail::create([
                    'organization_config_id' => $config->id,
                    'type' => $detail['type'],
                    'value' => $detail['value'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Configuración actualizada con éxito.');
    }
}