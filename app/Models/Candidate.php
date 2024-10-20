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
        'car_can',
        'tit_can',
        'fec_ing_can',
        'id_pol_par_bel', 
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($candidate) {
            if (!PoliticalParty::find($candidate->id_pol_par_bel)) {
                throw new \Exception("Invalid political party ID.");
            }
            
            $validPositions = ['Rector', 'Vicerrector'];
            if (!in_array($candidate->car_can, $validPositions)) {
                throw new \Exception("Invalid candidate position. Must be 'Rector' or 'Vicerrector'.");
            }
        });
        
    }

    public function politicalParty()
    {
        return $this->belongsTo(PoliticalParty::class, 'id_pol_par_bel');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'id_can');
    }
}
