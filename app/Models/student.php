<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class student extends Model
{
    protected $fillable = [
        'level_id',
        'name',
        'email',
        'phone'
     
    ];
    public function level():BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
    public function subjects():BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }

}
