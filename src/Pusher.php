<?php
namespace Valorin\PinPusher;

use GuzzleHttp\Client;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class Pusher implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    const API_USER_URL           = 'https://timeline-api.getpebble.com/v1/user/pins/';
    const API_USER_HEADER        = 'X-User-Token';
    const API_USER_SUBSCRIPTIONS = 'https://timeline-api.getpebble.com/v1/user/subscriptions/';

    const API_SHARED_URL    = 'https://timeline-api.getpebble.com/v1/shared/pins/';
    const API_SHARED_KEY    = 'X-API-Key';
    const API_SHARED_TOPICS = 'X-Pin-Topics';

    /**
     * @var array
     */
    protected $errors = [
        '400' => 'INVALID_JSON - The pin object submitted was invalid.',
        '403' => 'INVALID_API_KEY - The API key submitted was invalid.',
        '410' => 'INVALID_USER_TOKEN - The user token submitted was invalid or does not exist.',
        '429' => 'RATE_LIMIT_EXCEEDED - Server is sending updates too quickly.',
        '503' => 'SERVICE_UNAVAILABLE - Could not save pin due to a temporary server error.',
        'x'   => 'UNKNOWN ERROR OCCURRED!',
    ];

    /**
     * @param string $token
     * @param Pin    $pin
     *
     * @throws PebbleApiException
     */
    public function pushToUser($token, Pin $pin)
    {
        $url     = self::API_USER_URL.$pin->getId();
        $payload = $pin->generate();
        $headers = [self::API_USER_HEADER => $token];

        $this->log("Pusher::pushToUser => {$url}", ['payload' => $payload, 'headers' => $headers]);

        $this->push($url, $payload, $headers);
    }

    /**
     * @param string     $token
     * @param Pin|string $pin
     *
     * @throws PebbleApiException
     */
    public function deleteFromUser($token, $pin)
    {
        $url     = self::API_USER_URL.($pin instanceof Pin ? $pin->getId() : $pin);
        $headers = [self::API_USER_HEADER => $token];

        $this->log("Pusher::deleteFromUser => {$url}", ['headers' => $headers]);

        $this->delete($url, $headers);
    }

    /**
     * @param string $apiKey
     * @param array  $topics
     * @param Pin    $pin
     *
     * @throws PebbleApiException
     */
    public function pushShared($apiKey, array $topics, Pin $pin)
    {
        $url     = self::API_SHARED_URL.$pin->getId();
        $payload = $pin->generate();
        $headers = [
            self::API_SHARED_KEY    => $apiKey,
            self::API_SHARED_TOPICS => implode(',', $topics),
        ];

        $this->log("Pusher::pushShared => {$url}", ['payload' => $payload, 'headers' => $headers]);

        $this->push($url, $payload, $headers);
    }

    /**
     * @param string     $apiKey
     * @param Pin|string $pin
     *
     * @throws PebbleApiException
     */
    public function deleteShared($apiKey, $pin)
    {
        $url     = self::API_SHARED_URL.$pin->getId();
        $headers = [
            self::API_SHARED_KEY => $apiKey,
        ];

        $this->log("Pusher::deleteShared => {$url}", ['headers' => $headers]);

        $this->delete($url, $headers);
    }

    /**
     * @param $token
     *
     * @throws PebbleApiException
     * @return array
     *
     */
    public function listTopics($token)
    {
        $url     = self::API_USER_SUBSCRIPTIONS;
        $headers = [self::API_USER_HEADER => $token];

        $this->log("Pusher::listTopics => {$url}", ['headers' => $headers]);

        $this->get($url, $headers);
    }

    /**
     * @param string $url
     * @param array  $payload
     * @param array  $headers
     *
     * @throws PebbleApiException
     */
    protected function push($url, array $payload, array $headers)
    {
        $request = [
            'headers' => array_merge(
                ['Content-Type' => 'application/json'],
                $headers
            ),
            'json'       => $payload,
            'exceptions' => false,
        ];

        $this->request('put', $url, $request);
    }

    /**
     * @param string $url
     * @param array  $headers
     *
     * @throws PebbleApiException
     */
    protected function delete($url, array $headers)
    {
        $request = [
            'headers' => array_merge(
                ['Content-Type' => 'application/json'],
                $headers
            ),
            'exceptions' => false,
        ];

        $this->request('delete', $url, $request);
    }

    /**
     * @param string $url
     * @param array  $headers
     *
     * @throws PebbleApiException
     */
    protected function get($url, array $headers)
    {
        $request = [
            'headers' => array_merge(
                ['Content-Type' => 'application/json'],
                $headers
            ),
            'exceptions' => false,
        ];

        $this->request('get', $url, $request);
    }

    /**
     * @param $method
     * @param $url
     * @param $request
     *
     * @throws PebbleApiException
     */
    protected function request($method, $url, $request)
    {
        $response = (new Client)->$method($url, $request);

        if ($response->getStatusCode() != 200) {
            $error = $this->parseError($response->getStatusCode());
            $this->log('Error Received: '.$error, [$response->json()]);

            throw new PebbleApiException($error);
        }
    }

    /**
     * @param $message
     * @param $context
     */
    protected function log($message, $context)
    {
        if (!$this->logger) {
            return;
        }

        $this->logger->debug($message, $context);
    }

    /**
     * @param string $statusCode
     *
     * @return string
     */
    protected function parseError($statusCode)
    {
        return isset($this->errors[$statusCode]) ? $this->errors[$statusCode] : $this->errors['x'];
    }
}
