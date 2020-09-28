<?php


namespace App\Models;


use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClasseParticipant extends Model
{
    use HasFactory, Uuid, Notifiable;

    protected $fillable = [
        'classe_id',
        'user_id'
    ];
}
