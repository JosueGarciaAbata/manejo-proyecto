<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'proposals';
    protected $primaryKey = 'id_pro'; 

    protected $fillable = [
        'tit_pro',
        'des_pro',
        'fec_inc_pro',
        'visible',
        'tags_pro',
        'id_can_pro',
        'img_pro'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($proposal) {
            if (!Candidate::find($proposal->id_can_pro)) {
                throw new \Exception("Invalid candidate ID.");
            }
        });
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_can_pro');
    }

    public function organizationConfig(){
        return $this->belongsToMany(
            OrganizationConfig::class,
            'organization_config_proposals',
            'id_pro_prop',
            'org_main_prop'
        );
    }
}
