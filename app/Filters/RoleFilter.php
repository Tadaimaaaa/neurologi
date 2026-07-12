<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * Cek apakah role pengguna sesuai dengan yang dibutuhkan route.
     * $arguments berisi array role yang diperbolehkan, contoh: ['admin', 'dokter']
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userRole = session()->get('role');

        if ($arguments && !in_array($userRole, $arguments)) {
            // Redirect ke dashboard sesuai role jika mencoba akses halaman yang tidak sesuai
            return redirect()->to('/' . $userRole . '/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak diperlukan
    }
}
