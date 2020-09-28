<?php


namespace App\Http\Resources;


use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseParticipantRessource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => new UserResource(User::find($this->user_id))
        ];
    }
}
