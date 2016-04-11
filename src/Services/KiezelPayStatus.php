<?php
namespace Valorin\PinPusher\Services;

class KiezelPayStatus
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @var int
     */
    protected $paymentCode;

    /**
     * @var string
     */
    protected $purchaseStatus;

    /**
     * @var string
     */
    protected $checksum;

    /**
     * @param array $response
     */
    public function __construct($response)
    {
        $this->status         = array_get($response, 'status');
        $this->paymentCode    = array_get($response, 'paymentCode');
        $this->purchaseStatus = array_get($response, 'purchaseStatus');
        $this->checksum       = array_get($response, 'checksum');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getPaymentCode()
    {
        return $this->paymentCode;
    }

    /**
     * @return string
     */
    public function getPurchaseStatus()
    {
        return $this->purchaseStatus;
    }

    /**
     * @return string
     */
    public function getChecksum()
    {
        return $this->checksum;
    }
}
