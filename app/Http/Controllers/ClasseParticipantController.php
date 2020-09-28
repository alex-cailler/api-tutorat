<?php


namespace App\Http\Controllers;

use App\Http\Requests\Participant\StoreRequest;
use App\Http\Resources\ClasseParticipantRessource;
use App\Models\ClasseParticipant;


class ClasseParticipantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List all matters.
     *
     * @authenticated
     */
    public function index()
    {
        $participant = ClasseParticipant::all();

        return ClasseParticipantRessource::collection($participant);
    }

    /**
     * Create a new Participant.
     *
     * @authenticated
     *
     * @bodyParam
     * @param StoreRequest $request
     * @return ClasseParticipantRessource
     */
    public function store(StoreRequest $request)
    {

        $participant = new ClasseParticipant( $request->validated() );
        $participant->save();

        return new ClasseParticipantRessource($participant);
    }
}
