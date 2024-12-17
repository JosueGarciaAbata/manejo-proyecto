<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Icon extends Model
{
    use SoftDeletes;

    protected $table = 'icons';
    protected $primaryKey = 'id_icon';

    protected $fillable = [
        'id_icon',
        'name_icon',
        'path_icon',
    ];


    public function socialLink()
    {
        return $this->hasOne(SocialLink::class, 'id_icon_soc', 'id_icon');
    }

    public function socialLinks()
    {
        return $this->hasMany(OrganizationSocialLink::class, 'icon_id');
    }

}
