<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoliticalParty extends Model
{
    use SoftDeletes;

    protected $table = 'political_parties';
    protected $primaryKey = 'id_lis';

    protected $fillable = [
        'nom_lis',
        'des_lis',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($party) {
            if ($party->candidates()->count() > 0) {
                throw new \Exception("Cannot delete a party with associated candidates.");
            }
        });

        static::creating(function ($party) {
            if (!preg_match('/^[a-zA-Z0-9 ]+$/', $party->nom_lis)) {
                throw new \Exception("The name must contain only alphanumeric characters and spaces.");
            }
        });
    }

    public function candidates()
{
    return $this->hasMany(Candidate::class, 'id_pol_par_bel', 'id_lis');
}
    public function voters()
    {
        return $this->hasMany(Voter::class, 'id_lis_vot', 'id_lis');
    }

    public function getAllLists()
    {
        return PoliticalParty::select('id_lis', 'nom_lis')->get();
    }
}