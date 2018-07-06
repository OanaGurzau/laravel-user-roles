<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      //1.User should be authenticated
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
           //returneaza toate rolurile; din tot ia numai primul rol

          return $next($request);
        
        else
          return redirect('/'); //daca userul nu e autentificat redirectare pe pagina



      //2. Authenticated user should have the role admin



    }
}
