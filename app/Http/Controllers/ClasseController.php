<?php


namespace App\Http\Controllers;


use App\Http\Requests\Classe\ShowRequest;
use App\Http\Requests\Classe\StoreRequest;
use App\Http\Resources\ClasseResource;
use App\Models\Classe;

class ClasseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List all classes.
     *
     * @authenticated
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $classes = Classe::all();

        return ClasseResource::collection($classes);
    }

    /**
     * Create a new classe.
     *
     * @authenticated
     *
     * @bodyParam
     * @param StoreRequest $request
     * @return ClasseResource
     */
    public function store(StoreRequest $request)
    {

        $classe = new Classe( $request->validated() );
        $classe->save();

        return new ClasseResource($classe);
    }

    /**
     * Show an existing user.
     *
     * @authenticated
     *
     * @urlParam user   required    The user id.    Example: 00000000-0000-0000-0000-000000000000
     * @param ShowRequest $request
     * @param Classe $classe
     * @return ClasseResource
     */
    public function show(ShowRequest $request, Classe $classe)
    {
        return new ClasseResource($classe);
    }
}
