<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'faculty_id', 'program_id', 'semester', 'tempat_lahir', 'birthday', 'address', 'phone', 'email'
    ];

    /**
     * One to one relationship with faculty
     */
    public function faculty(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * One  to one relationship with program
     */
    public function program(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
