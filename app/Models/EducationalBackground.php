<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationalBackground extends Model
{
    use SoftDeletes;

    protected $table = 'educational_backgrounds';
    protected $primaryKey = 'id_edu';

    protected $fillable = [
        'id_edu',
        'id_can_edu',
        'grad_edu',
        'nom_edu',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_can_edu');
    }

}
