<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'slogan', 'icon_path', 'mission', 'vision', 'representative',
        'main_proposals', 'footer_text', 'social_icons', 'contact_info'
    ];

    // Indica que estos campos son arreglos JSON
    protected $casts = [
        'main_proposals' => 'array',
        'social_icons' => 'array',
        'contact_info' => 'array',
    ];
}
