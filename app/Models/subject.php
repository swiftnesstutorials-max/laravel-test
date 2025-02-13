<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class subject extends Model
{
   protected $fillable = [
        
        'name',
         
    ];
    public function students():BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
