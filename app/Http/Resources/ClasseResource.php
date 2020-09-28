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
            'matter_id' => new MatterResource(Matter::find($this->matter_id)),
            'status' => $this->status,
            'teacher_id' => new UserResource(User::find($this->teacher_id)),
            'participants' => ClasseParticipantRessource::collection($this->classeParticipants()->get())
        ];
    }
}
