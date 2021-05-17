<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Departemen_description extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'departemen_id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
