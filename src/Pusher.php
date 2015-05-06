<?php
namespace Valorin\PinPusher;

class Pusher 
{
    /**
     * @param string $token
     * @param Pin $pin
     */
    public function pushToToken($token, Pin $pin)
    {
        throw new \Exception('Not implemented yet!');
    }

    /**
     * @param string $token
     * @param Pin|string $pin
     */
    public function deleteFromToken($token, $pin)
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
}
