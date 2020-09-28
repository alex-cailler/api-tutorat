<?php


namespace App\Http\Controllers;

use App\Http\Requests\Security\RegisterRequest;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DateTime;


class SecurityController extends Controller
{
    public function register( RegisterRequest $request)
    {
        $request[ 'password' ] = bcrypt( $request->password );
        $request['email'] = strtolower($request['email']);

        $user        =  User::create( $request->validated() );
        $accessToken =  $user->createToken( 'authToken' )->accessToken;

        return response([
            'user'          => $user,
            'access_token'  => $accessToken,
            'redirect'      => '/t/dashboard',
        ]);
    }

    public function emailVerification($email)
    {
        $user = User::where('email','=',$email);

        if (!is_null($user)) {
            $user->update([
                'email_verified_at'  => new DateTime()
            ]);

            return response([
                'message' => 'Email validé avec succès !',
                'status' => 200
            ]);
        } else return response([
            'status' => 404
        ]);
    }

    public function me()
    {
        $user = Auth::user();
        return response()->json([
            'success' => $user
        ], $this->successStatus);
    }

    public function login( Request $request )
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt( $credentials )) {
            $accessToken = auth()->user()->createToken( 'authToken' )->accessToken;

            return response([
                'user'          => auth()->user(),
                'access_token'  => $accessToken
            ]);
        }

        return response([
            'message' => 'Invalid credentials'
        ], 422);
    }

    public function updatePassword( Request $request ) {
        $request->validate([
            'current_password'      => [ 'required', new MatchOldPassword ],
            'new_password'          => [ 'required' ],
            'new_confirm_password'  => [ 'same:new_password' ],
        ]);

        User::find( auth()
            ->user()
            ->id )
            ->update([
                'password'  => Hash::make( $request->new_password )
            ]);

        return response()
            ->json();
    }


}
