<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $fillable = ['nom_client','prenom_client','tel_client', 'email_client','budget_client','preferences'];
    public function visites()
    {
        return $this->hasMany(Visite::class, 'client_id');
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class, 'client_id');
    }

}
