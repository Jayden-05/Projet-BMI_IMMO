<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $table = 'pieces';
    protected $primaryKey = 'idpiece';

    protected $fillable = [
        'numpiece',
        'dateemission',
        'typepiece',
        'client_id',
    ];

    protected $casts = [
        'dateemission' => 'date',
    ];

    /**
     * Relation avec le client
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
