<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $session = session();

        // Check if the user is logged in
        if (!$session->has('user_id')) {
            return redirect()
                ->to(site_url('login'))
                ->with('error', 'Please log in to manage tasks.');
        }

        // Allow authenticated users to continue
        return null;
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // No action required
    }
}
