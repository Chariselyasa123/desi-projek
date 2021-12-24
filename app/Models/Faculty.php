<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Has many relationship with the Program model.
     */
    public function programs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Program::class);
    }
}
