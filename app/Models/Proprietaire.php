<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;
    protected $table = 'proprietaire';
    protected $fillable = ['nom_proprio','prenom_proprio', 'tel_proprio', 'email_proprio', 'adresse_proprio'];

    public function biens()
{
    return $this->hasMany(Bien::class, 'id_proprio');
}

}
