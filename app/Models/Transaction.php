<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'visite_id',
        'client_id',
        'bien_id',
        'contrat_id',
        'montant',
        'moyen_paiement',
        'statut_transaction',
        'reference_transaction',
        'date_transaction',
        'note',
    ];

    // 🔹 Relation avec la visite
    public function visite()
    {
        return $this->belongsTo(Visite::class, 'visite_id');
    }

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

    // 🔹 Relation avec le contrat
    public function contrat()
    {
        return $this->hasOne(Contrat::class, 'transaction_id');
    }
}
