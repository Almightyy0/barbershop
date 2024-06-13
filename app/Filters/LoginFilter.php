<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        $logged = session()->get('logged');
        $role = session()->get('role');
        if ($logged) {
          if($role == 'admin'){
            return redirect()->to(base_url('/admin'));
          }
          elseif($role == 'barber'){
            return redirect()->to(base_url('/pegawai'));
          }else{
            return redirect()->to(base_url('/'));
          }
          
        }
        // Jika level admin, izinkan akses ke grup Admin
        
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}