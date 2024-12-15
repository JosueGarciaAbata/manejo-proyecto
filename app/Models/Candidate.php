<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use SoftDeletes;

    protected $table = 'candidates';
    protected $primaryKey = 'id_can';

    protected $fillable = [
        'nom_can',
        'ape_can',
        'ruta_can',
        'car_can',
        'tit_can',
        'fec_ing_can',
        'descrip_can',
        'id_can_soc',
        'id_pol_par_bel',
        'jerarquia'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($candidate) {
            if (!PoliticalParty::find($candidate->id_pol_par_bel)) {
                throw new \Exception("Invalid political party ID.");
            }
        });

    }

    public function politicalParty()
    {
        return $this->belongsTo(PoliticalParty::class, 'id_pol_par_bel');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'id_can_pro');
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class, 'id_can_soc');
    }

    public function educationalBackgrounds()
    {
        return $this->hasMany(EducationalBackground::class, 'id_can_edu');
    }

    public function professionalExperiences()
    {
        return $this->hasMany(ProfessionalExperience::class, 'id_can_exp');
    }

}