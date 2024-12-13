<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'slogan', 'icon_path', 'representative',
        'main_proposals', 'footer_text'
    ];

    protected $casts = [
        'main_proposals' => 'array',
    ];

    public function socialLinks()
    {
        return $this->hasMany(OrganizationSocialLink::class);
    }

    public function contactDetails()
    {
        return $this->hasMany(OrganizationContactDetail::class);
    }

    public function proposals(){
        return $this->belongsToMany(
            Proposal::class, // modelo 
            'organization_config_proposals', // tabla interm 
            'org_main_prop', // clav for para OrgConfg
            'id_pro_prop'); // clav for para Proposal, ambos d la tabla interm
    }
}
