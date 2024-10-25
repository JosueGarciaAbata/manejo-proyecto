<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{

    use SoftDeletes;

    protected $table = 'social_links';

    protected $primaryKey = 'id_soc';

    protected $fillable = [
        'id_can_soc',
        'platform',
        'url_sco'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_can_soc');
    }

    public function icon()
    {
        return $this->belongsTo(Icon::class, 'id_icon_soc');
    }

}
