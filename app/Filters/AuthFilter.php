<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login'); // Redirect to login if not authenticated
        }

        // If specific role is passed in the arguments, check for it
        if (isset($arguments[0])) {
            $requiredRole = $arguments[0];
            // Check if the user's role matches the required role
            if (session()->get('role') !== $requiredRole) {
                return redirect()->to('/login'); // Redirect to login if the role does not match
            }
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Optional: actions to perform after the request
    }
}

