<?php


namespace App\Http\Controllers;


use App\Http\Requests\User\DestroyRequest;
use App\Http\Requests\User\ShowRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group users
 *
 * Endpoints for interacting with the users.
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List all users.
     *
     * @authenticated
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Create a new user.
     *
     * @authenticated
     *
     * @bodyParam first_name    string  required    The user first name.                        Example: John
     * @bodyParam last_name     string  required    The user last name.                         Example: Doe
     * @bodyParam birth_date    string  required    The user birth date.                        Example: 01/01/2000
     * @bodyParam email         string  required    The user email (will be used as username).  Example: john@binch.me
     * @bodyParam password      string  required    The user password.                          Example: password
     * @param StoreRequest $request
     * @return UserResource
     */
    public function store(StoreRequest $request)
    {
        $user = new User($request->validated());
       // $user->role = 'customer';
        $user->save();

        return new UserResource($user);
    }

    /**
     * Show an existing user.
     *
     * @authenticated
     *
     * @urlParam user   required    The user id.    Example: 00000000-0000-0000-0000-000000000000
     * @param ShowRequest $request
     * @param User $user
     * @return UserResource
     */
    public function show(ShowRequest $request, User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update an existing user.
     *
     * @authenticated
     *
     * @urlParam user   required    The user id.    Example: 00000000-0000-0000-0000-000000000000
     *
     * @bodyParam first_name    string  The user first name.                        No-example
     * @bodyParam last_name     string  The user last name.                         No-example
     * @bodyParam birth_date    string  The user birth date.                        No-example
     * @bodyParam email         string  The user email (will be used as username).  No-example
     * @bodyParam password      string  The user password.                          No-example
     * @param UpdateRequest $request
     * @param User $user
     * @return UserResource
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Delete an existing user.
     *
     * @authenticated
     *
     * @urlParam user   required    The user id.    Example: 11111111-1111-1111-1111-111111111111
     * @param DestroyRequest $request
     * @param User $user
     * @return Response
     * @throws \Exception
     */
    public function destroy(DestroyRequest $request, User $user)
    {
        $user->delete();

        return new Response(null, 204);
    }
}
