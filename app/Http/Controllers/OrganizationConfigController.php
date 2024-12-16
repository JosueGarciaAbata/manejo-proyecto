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
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'representant' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'main_proposals' => 'nullable|array',
            'footer_text' => 'nullable|string',
            'social_links.platform' => 'nullable|array',
            'social_links.url' => 'nullable|array',
            'contact_details.type' => 'nullable|array',
            'contact_details.value' => 'nullable|array',
        ]);

        $config = OrganizationConfig::firstOrCreate([]);

        // Actualizar archivos de imagen
        if ($request->hasFile('icon')) {
            if ($config->icon) {
                Storage::disk('public')->delete($config->icon);
            }
            $config->icon = $request->file('icon')->store('organization/icons', 'public');
        }

        if ($request->hasFile('representant')) {
            if ($config->representant) {
                Storage::disk('public')->delete($config->representant);
            }
            $config->representant = $request->file('representant')->store('organization/represent', 'public');
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
        //dd($validatedData['contact_details']);
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
        if (
            isset($contactDetails['type'], $contactDetails['value']) &&
            count($contactDetails['type']) === count($contactDetails['value'])
        ) {
            foreach (array_keys($contactDetails['type']) as $index) {
                $type = $contactDetails['type'][$index];
                $value = $contactDetails['value'][$index];
    
                if (!empty($type) && !empty($value)) {
                    $config->contactDetails()->updateOrCreate(
                        ['type' => $type], // Buscar por 'type'
                        ['value' => $value, 'config_id' => $config->id] // Actualizar el 'value'
                    );
                }
            }
        }
    }
}
