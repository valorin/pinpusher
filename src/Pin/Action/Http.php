<?php
namespace Valorin\PinPusher\Pin\Action;

class Http extends Base
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';

    /**
     * @var string
     */
    protected $type = 'http';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $bodyText;

    /**
     * @var array
     */
    protected $bodyJSON;

    /**
     * @var string
     */
    protected $successText;

    /**
     * @var string
     */
    protected $successIcon;

    /**
     * @var string
     */
    protected $failureText;

    /**
     * @var string
     */
    protected $failureIcon;

    /**
     * @param string $title
     * @param string $url
     */
    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url   = $url;
    }

    /**
     * @param string $method
     *
     * @return Http
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param array $headers
     *
     * @return Http
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param string $bodyText
     *
     * @return Http
     */
    public function setBodyText($bodyText)
    {
        $this->bodyText = $bodyText;

        return $this;
    }

    /**
     * @param array $bodyJSON
     *
     * @return Http
     */
    public function setBodyJSON(array $bodyJSON)
    {
        $this->bodyJSON = $bodyJSON;

        return $this;
    }

    /**
     * @param string $successText
     *
     * @return Http
     */
    public function setSuccessText($successText)
    {
        $this->successText = $successText;

        return $this;
    }

    /**
     * @param string $successIcon
     *
     * @return Http
     */
    public function setSuccessIcon($successIcon)
    {
        $this->successIcon = $successIcon;

        return $this;
    }

    /**
     * @param string $failureText
     *
     * @return Http
     */
    public function setFailureText($failureText)
    {
        $this->failureText = $failureText;

        return $this;
    }

    /**
     * @param string $failureIcon
     *
     * @return Http
     */
    public function setFailureIcon($failureIcon)
    {
        $this->failureIcon = $failureIcon;

        return $this;
    }
}
