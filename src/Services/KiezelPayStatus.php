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
     * @var int
     */
    protected $validityPeriodInDays;

    /**
     * @var int
     */
    protected $trialDurationInSeconds;

    /**
     * @param array $response
     */
    public function __construct($response)
    {
        $this->status                 = array_get($response, 'status');
        $this->paymentCode            = array_get($response, 'paymentCode');
        $this->purchaseStatus         = array_get($response, 'purchaseStatus');
        $this->checksum               = array_get($response, 'checksum');
        $this->validityPeriodInDays   = array_get($response, 'validityPeriodInDays');
        $this->trialDurationInSeconds = array_get($response, 'trialDurationInSeconds');
    }

    /**
     * @return bool
     */
    public function isLicensed()
    {
        return $this->getStatus() === 'licensed';
    }

    /**
     * @return bool
     */
    public function isUnlicensed()
    {
        return $this->getStatus() === 'unlicensed';
    }

    /**
     * @return bool
     */
    public function isTrial()
    {
        return $this->getStatus() === 'trial';
    }

    /**
     * @return bool
     */
    public function waitingForUser()
    {
        return $this->getPurchaseStatus() === 'waitForUser';
    }

    /**
     * @return bool
     */
    public function inProgress()
    {
        return $this->getPurchaseStatus() === 'inProgress';
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

    /**
     * @return int
     */
    public function getValidityPeriodInDays()
    {
        return $this->validityPeriodInDays;
    }

    /**
     * @return int
     */
    public function getTrialDurationInSeconds()
    {
        return $this->trialDurationInSeconds;
    }
}
