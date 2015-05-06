<?php
namespace Valorin\PinPusher;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class Pusher implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    const API_USER_URL = 'https://timeline-api.getpebble.com/v1/user/pins/';
    const API_USER_HEADER = 'X-User-Token';
    const API_USER_SUBSCRIPTIONS = 'https://timeline-api.getpebble.com/v1/user/subscriptions/';

    const API_SHARED_URL = 'https://timeline-api.getpebble.com/v1/shared/pins/';
    const API_SHARED_KEY = 'X-API-Key';
    const API_SHARED_TOPICS = 'X-Pin-Topics';

    /**
     * @var array
     */
    protected $errors = [
        '400' => ['INVALID_JSON' => 'The pin object submitted was invalid.'],
        '403' => ['INVALID_API_KEY' => 'The API key submitted was invalid.'],
        '410' => ['INVALID_USER_TOKEN' => 'The user token submitted was invalid or does not exist.'],
        '429' => ['RATE_LIMIT_EXCEEDED' => 'Server is sending updates too quickly.'],
        '503' => ['SERVICE_UNAVAILABLE' => 'Could not save pin due to a temporary server error.'],
    ];

    /**
     * @param string $token
     * @param Pin $pin
     */
    public function pushToUser($token, Pin $pin)
    {
        throw new \Exception('Not implemented yet!');
    }

    /**
     * @param string $token
     * @param Pin|string $pin
     */
    public function deleteFromUser($token, $pin)
    {
        throw new \Exception('Not implemented yet!');
    }

    /**
     * @param string $apiKey
     * @param array $topics
     * @param Pin   $pin
     */
    public function pushShared($apiKey, array $topics, Pin $pin)
    {
        throw new \Exception('Not implemented yet!');
    }

    /**
     * @param string $apiKey
     * @param Pin|string $pin
     */
    public function deleteShared($apiKey, $pin)
    {
        throw new \Exception('Not implemented yet!');
    }

    /**
     * @param $token
     * @return array
     */
    public function listTopics($token)
    {
        throw new \Exception('Not implemented yet!');
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
}
