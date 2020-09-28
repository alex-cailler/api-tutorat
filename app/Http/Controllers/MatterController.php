<?php


namespace App\Http\Controllers;


use App\Http\Requests\Matter\DestroyRequest;
use App\Http\Requests\Matter\StoreRequest;
use App\Http\Resources\MatterResource;
use App\Models\Matter;
use http\Client\Response;

class MatterController extends Controller
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
        $matters = Matter::all();

        return MatterResource::collection($matters);
    }

    /**
     * Create a new matter.
     *
     * @authenticated
     *
     * @bodyParam libel         string  required    The name matter.  Example: Vue.js
     * @param StoreRequest $request
     * @return MatterResource
     */
    public function store(StoreRequest $request)
    {

        $matter = new Matter( $request->validated() );
        $matter->save();

        return new MatterResource($matter);
    }

    /**
     * Show an existing user.
     *
     * @authenticated
     *
     * @urlParam matter   required    The matter id.    Example: 00000000-0000-0000-0000-000000000000
     */
    public function show($id)
    {
        $matter = Matter::find($id);
        return new MatterResource($matter);
    }

    /**
     * Delete an existing user.
     *
     * @authenticated
     *
     * @urlParam matter   required    The matter id.    Example: 11111111-1111-1111-1111-111111111111
     * @param DestroyRequest $request
     * @param Matter $matter
     * @return Response
     * @throws \Exception
     */
    public function destroy(DestroyRequest $request, Matter $matter)
    {
        $matter->delete();

        return new Response(null, 204);
    }
}
