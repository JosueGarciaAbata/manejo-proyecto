<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSocialLink extends Model
{
    use HasFactory;

    protected $fillable = ['organization_config_id', 'platform', 'url'];

    public function organizationConfig()
    {
        return $this->belongsTo(OrganizationConfig::class);
    }

    public function icon()
    {
        return $this->belongsTo(Icon::class, 'icon_id');
    }
}
