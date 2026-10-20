<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = 'agent';
    protected $fillable = ['nom_agent','prenom_agent', 'tel_agent', 'email_agent', 'zone_affectation','type_agent'];
}
