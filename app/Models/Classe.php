<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Classe extends Model
{
    use HasFactory, Notifiable, Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matter_id',
        'status', // finish, in run, cancel, is program
        'teacher_id',
        'address',
        'date',
        'salle',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function classeParticipants()
    {
        return $this->hasMany(ClasseParticipant::class);
    }
}
