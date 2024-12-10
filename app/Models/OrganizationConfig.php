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
}
