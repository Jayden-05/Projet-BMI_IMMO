<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bien extends Model
{
    use HasFactory;

    protected $table = 'bien';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type_bien',
        'slug',
        'adresse_bien',
        'superficie',
        'prix',
        'statut',
        'description',
        'id_proprio',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bien) {
            $bien->slug = Str::slug($bien->type_bien . '-' . $bien->adresse_bien . '-' . time());
        });

        static::updating(function ($bien) {
            if ($bien->isDirty('type_bien') || $bien->isDirty('adresse_bien')) {
                $bien->slug = Str::slug($bien->type_bien . '-' . $bien->adresse_bien . '-' . time());
            }
        });
    }



    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class, 'id_proprio');
    }

    public function visites()
    {
        return $this->hasMany(Visite::class, 'bien_id');
    }

    // ✅ NOUVELLES RELATIONS POUR LES IMAGES
    public function images()
    {
        return $this->hasMany(BienImage::class, 'bien_id');
    }

    public function mainImage()
    {
        return $this->hasOne(BienImage::class, 'bien_id')->where('is_main', true);
    }
}
