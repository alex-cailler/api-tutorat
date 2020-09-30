<?php


namespace App\Http\Resources;


use App\Models\ClasseParticipant;
use App\Models\Matter;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'matter' => new MatterResource(Matter::find($this->matter_id)),
            'status' => $this->status,
            'teacher' => new UserResource(User::find($this->teacher_id)),
            'participants' => $this->when(property_exists($this, 'classe_participants'), function () {
                return ClasseParticipantRessource::collection($this->classeParticipants()->get());
            }),
            'created_at' => $this->created_at,
            'address' => $this->address,
            'date' => $this->date,
            'room_nbr' => $this->room_nbr,
            'place_available_nbr' => $this->place_available_nbr,
            'level' => $this->level,
        ];
    }
}
