<?php

namespace PopTroco\Http\Middleware;

use Closure;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use PopTroco\Repositories\UserRepository;

class OAuthCheckRole
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $id = Authorizer::getResourceOwnerId();

        $user = $this->userRepository->find($id);

        if ($user->role_id != $role) {
            abort(403, 'Acesso Negado');
        }

        return $next($request);
    }
}
