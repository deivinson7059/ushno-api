<?php
namespace App\Filter;

use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;

class AuthFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {

        try {
            $key        = Services::getSecretKey();
            $authHeader = $request->getServer('HTTP_AUTORIZATION');
            if ($authHeader == null) {
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'No se proporciono JWT');
            }

            $arr = explode(' ', $authHeader);
            $jwt = $arr[1];

            JWT::encode($jwt, $key, ['HS256']);

        } catch (\Exception$e) {
            return Services::response()->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Algo salio mal, intenta de nuevo');

        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }

}
