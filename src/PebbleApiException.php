<?php
namespace Valorin\PinPusher;

class PebbleApiException extends \Exception
{
    /**
     * @var array
     */
    private $response;

    /**
     * @var array
     */
    private $pin;

    /**
     * @param string $message
     * @param int    $code
     * @param array  $response
     * @param array  $pin
     */
    public function __construct($message, $code, $response = [], $pin = [])
    {
        parent::__construct($message, $code);

        $this->response = $response;
        $this->pin      = $pin;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return array
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'code'      => $this->getCode(),
            'exception' => $this->getMessage(),
            'response'  => $this->getResponse(),
            'pin'       => $this->getPin(),
        ];
    }
}
