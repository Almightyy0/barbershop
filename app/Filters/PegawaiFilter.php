<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PegawaiFilter implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role');
         if (session()->get('role') != 'barber') {
            return redirect()->to(base_url('/login'));
        }
        
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}