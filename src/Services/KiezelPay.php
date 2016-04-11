<?php
namespace Valorin\PinPusher\Services;

use GuzzleHttp\Client;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class KiezelPay implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var string
     */
    protected $url = 'https://kiezelpay.com/api/v1/status';

    /**
     * @var int
     */
    protected $appId;

    /**
     * @param int $appId
     */
    public function __construct($appId, $url = null)
    {
        $this->appId = $appId;

        if ($url) {
            $this->url = $url;
        }
    }

    /**
     * @param string $accountToken
     * @param string $deviceId
     *
     * @return KiezelPayStatus
     */
    public function status($accountToken, $deviceId)
    {
        $parameters = [
            'appid'        => $this->appId,
            'accounttoken' => $accountToken,
            'devicetoken'  => $deviceId,
            'rand'         => mt_rand(),
        ];

        $response = (new Client)->get($this->url, [
            'query'      => $parameters,
            'exceptions' => false,
        ])->json();

        $this->log('KiezelPay status check', ['parameters' => $parameters, 'response' => $response]);

        return new KiezelPayStatus($response);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    protected function log($message, array $context = [])
    {
        if (!$this->logger) {
            return;
        }

        $this->logger->debug($message, $context);
    }
}
