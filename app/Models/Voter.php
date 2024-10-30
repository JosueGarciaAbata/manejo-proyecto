<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{

    protected $table = 'voters';
    protected $primaryKey = 'id_vot';

    protected $fillable = [
        'nom_vot',
        'ape_vot',
        'ema_vot',
        'id_lis_vot'
    ];


    //Mantengo esta validación para un mensaje de error más claro y personalizado si la verificación de la base de datos falla.
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($voter) {
            if (Voter::where('ema_vot', $voter->ema_vot)->exists()) {
                throw new \Exception("The voter is already registered");
            }
        });
    }


    public function politicalParty()
    {
        return $this->belongsTo(PoliticalParty::class, 'id_lis_vot');
    }



    public function suggestions()
    {
        return $this->hasMany(Suggestion::class, 'id_vot_sug');
    }


    public static function countPoliticalVoters()
    {
        return self::where('id_lis_vot', null)->count();
    }
    
}