<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    protected $table = 'visite';

    protected $fillable = [
        'bien_id',
        'client_id',
        'date_visite',
        'heure_visite',
        'statut_visite',
        'montant_visite',
        'moyen_paiement',
    ];

    // 🔹 Relation avec le client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // 🔹 Relation avec le bien
    public function bien()
    {
        return $this->belongsTo(Bien::class, 'bien_id');
    }

    // 🔹 Relation avec les transactions (une visite peut avoir plusieurs transactions)
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'visite_id');
    }
}
