<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfessionalExperience extends Model
{
    use SoftDeletes;

    protected $table = 'profesional_experiences';

    protected $primaryKey = 'id_exp';

    protected $fillable = [
        'id_exp',
        'id_can_exp',
        'pos_exp',
        'nom_exp',
    ];


    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_can_exp');
    }

}
