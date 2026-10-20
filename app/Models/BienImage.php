<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienImage extends Model
{
    use HasFactory;

    protected $fillable = ['bien_id', 'image_path', 'is_main'];

    public function bien()
    {
        return $this->belongsTo(Bien::class, 'bien_id');
    }
}
