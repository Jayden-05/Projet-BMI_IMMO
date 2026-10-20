<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'client_id',
        'bien_id',
        'numero_contrat',
        'type_contrat',
        'date_contrat',
        'date_debut',
        'date_fin',
        'montant_loyer',
        'caution',
        'conditions',
        'statut_contrat',
        'fichier_contrat',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'date_contrat' => 'date',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }

    /**
     * Accesseur pour obtenir le statut réel du contrat
     * Si la date_fin est passée, le contrat est "Expiré"
     */
    public function getStatutRealAttribute()
    {
        if ($this->date_fin && Carbon::parse($this->date_fin)->isPast()) {
            return 'Expiré';
        }
        return $this->statut_contrat;
    }

    /**
     * Vérifier si un contrat est expiré
     */
    public function isExpired()
    {
        return $this->date_fin && Carbon::parse($this->date_fin)->isPast();
    }

    /**
     * Mettre à jour le statut si le contrat est expiré
     */
    public function updateStatusIfExpired()
    {
        if ($this->isExpired() && $this->statut_contrat !== 'Expiré') {
            $this->update(['statut_contrat' => 'Expiré']);
            return true;
        }
        return false;
    }
}

