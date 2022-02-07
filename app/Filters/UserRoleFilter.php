<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserRoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('userRole') == 'moderator' && !session()->has('loggedUser')) {
             return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}