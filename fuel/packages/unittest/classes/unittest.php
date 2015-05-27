<?php

namespace Unittest;

class UnittestException extends \FuelException {}

class Response extends \Fuel\Core\Response
{
    private static $redirect_status = null;
    private static $redirect_url = "";

	/**
     * Override Fuel\Core\Response redirect method
     *
     * @param   string  $url     The url
     * @param   string  $method  The redirect method
     * @param   int     $code    The redirect status code
     *
     * @return  void
     */
    public static function redirect($url = '', $method = 'location', $code = 302)
    {
        $response = new static;
        $response->set_status($code);

        if (strpos($url, '://') === false)
        {
            $url = $url !== '' ? \Uri::create($url) : \Uri::base();
        }

        strpos($url, '*') !== false and $url = \Uri::segment_replace($url);

        if ($method == 'location')
        {
            $response->set_header('Location', $url);
        }
        elseif ($method == 'refresh')
        {
            $response->set_header('Refresh', '0;url='.$url);
        }
        else
        {
            return;
        }

        if (\Fuel\Core\Fuel::$env != 'test')
        {
            $response->send(true);
            exit;
        }

        Response::$redirect_status = $code;
        Response::$redirect_url = $url;

        $response->send(true);
    }

    public static function get_redirect_status()
    {
        return Response::$redirect_status;
    }

    public static function get_redirect_url()
    {
        return Response::$redirect_url;
    }

}
