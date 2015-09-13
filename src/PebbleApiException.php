<?php
namespace Valorin\PinPusher;

class PebbleApiException extends \Exception
{
    /**
     * @var array
     */
    private $response;

    /**
     * @param string $message
     * @param int    $code
     * @param array  $response
     */
    public function __construct($message, $code, $response = [])
    {
        parent::__construct($message, $code);

        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }
}
