<?php

namespace App\Http\Controllers;

use App\Models\OrganizationConfig;
use App\Models\OrganizationContactDetail;
use App\Models\OrganizationSocialLink;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationConfigController extends Controller
{
    public function showConfig()
    {
        $config = OrganizationConfig::with([
            'socialLinks', 
            'contactDetails', 
            'proposals'
            ])->first();
            
            $proposals = Proposal::where('visible', 1)->get();
    
        return view('pages.config', compact('config', 'proposals'));
    }

    public function updateConfig(Request $request)
    {
        $validatedData = $request->validate([
            'slogan' => 'nullable|string|max:255',
            'icon_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'representative' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'main_proposals' => 'nullable|array',
            'footer_text' => 'nullable|string',
            'social_links.platform' => 'nullable|array',
            'social_links.url' => 'nullable|array',
            'contact_details.type' => 'nullable|array',
            'contact_details.value' => 'nullable|array',
        ]);

        $config = OrganizationConfig::firstOrCreate([]);

        // Actualizar archivos de imagen
        if ($request->hasFile('icon_path')) {
            if ($config->icon_path) {
                Storage::disk('public')->delete($config->icon_path);
            }
            $config->icon_path = $request->file('icon_path')->store('organization/icons', 'public');
        }

        if ($request->hasFile('representative')) {
            if ($config->representative) {
                Storage::disk('public')->delete($config->representative);
            }
            $config->representative = $request->file('representative')->store('organization/representatives', 'public');
        }

        // Actualizar configuraciones principales
        $config->update([
            'slogan' => $validatedData['slogan'] ?? $config->slogan,
            'footer_text' => $validatedData['footer_text'] ?? $config->footer_text,
        ]);

        // Actualizar propuestas principales
        $config->proposals()->sync($validatedData['main_proposals'] ?? []);

        // Actualizar enlaces sociales
        $this->updateSocialLinks($config, $validatedData['social_links'] ?? []);

        // Actualizar detalles de contacto
        $this->updateContactDetails($config, $validatedData['contact_details'] ?? []);

        return redirect()->back()->with('success', 'Configuración actualizada con éxito.');
    }

    private function updateSocialLinks(OrganizationConfig $config, array $socialLinks)
    {
        if (!empty($socialLinks['platform']) && !empty($socialLinks['url'])) {
            foreach ($socialLinks['platform'] as $index => $platform) {
                if (!empty($platform) && !empty($socialLinks['url'][$index])) {
                    $config->socialLinks()->updateOrCreate(
                        ['platform' => $platform],
                        ['url' => $socialLinks['url'][$index]]
                    );
                }
            }
        }
    }

    private function updateContactDetails(OrganizationConfig $config, array $contactDetails)
    {
        if (!empty($contactDetails['type']) && !empty($contactDetails['value'])) {
            foreach ($contactDetails['type'] as $index => $type) {
                if (!empty($type) && !empty($contactDetails['value'][$index])) {
                    $config->contactDetails()->updateOrCreate(
                        ['type' => $type],
                        ['value' => $contactDetails['value'][$index]]
                    );
                }
            }
        }
    }
}