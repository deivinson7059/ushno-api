<?php namespace App\Filters;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Firebase\JWT\JWT;

class AuthFilter implements FilterInterface
{
    use ResponseTrait;

    public function before(RequestInterface $request, $arguments = null)
    {
        $key        = Services::getSecretKey();
        $authHeader = $request->getServer('HTTP_AUTHORIZATION');
        $arr        = explode(' ', $authHeader);
        $token      = $arr[1];

        if ($authHeader == null) {
            return Services::response()
                ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'No se proporciono JWT');
        }

        try
        {
            JWT::decode($token, $key, ['HS256']);
        } catch (\Exception$e) {
            return Services::response()
                ->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Algo salio mal, intenta de nuevo');

        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
