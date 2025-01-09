<?php

namespace Bdtask\Tranzak;

use Bdtask\Tranzak\Auth\TokenManager;
use Bdtask\Tranzak\Services\Account;
use Bdtask\Tranzak\Services\Payment;
use Bdtask\Tranzak\Services\Transfer;

class Tranzak
{
    private TokenManager $tokenManager;
    private Account $account;
    private Payment $payment;
    private Transfer $transfer;

    public function __construct(string $appId, string $appKey, string $baseUrl)
    {
        $this->tokenManager = new TokenManager($appId, $appKey, $baseUrl);
        $this->account = new Account($this->tokenManager);
        $this->payment = new Payment($this->tokenManager);
        $this->transfer = new Transfer($this->tokenManager);
    }

    /**
     * Make authenticate for access all api
     * @return string
     */
    public function authenticate(): string
    {
        return $this->tokenManager->getAuthToken();
    }

    /**
     * Get token expiry time
     * @return int
     */
    public function getExpiryTime(): int
    {
        return $this->tokenManager->getExpiryTime();
    }

    /**
     * Set access token if already have generated token
     * @param string $token
     * @return void
     */
    public function setAuthToken(string $token): void
    {
        $this->tokenManager->setAuthToken($token);
    }

    /**
     * Get api access token
     * @return string
     */
    public function getToken(): string
    {
        return $this->tokenManager->get();
    }

    /**
     * Reauth api access token
     * @return void
     */
    public function refreshAuthToken(): void
    {
        $this->tokenManager->refreshToken();
    }

    /**
     * Get account details by account Id
     * @param string $accountId
     * @return array
     */
    public function accountDetails(string $accountId): array
    {
        return $this->account->details($accountId);
    }

    /**
     * Get merchant all sub account list
     * @return array
     */
    public function merchantSubAccountList(): array
    {
        return $this->account->merchantSubList();
    }

    /**
     * Get details of disbursement account
     * @return array
     */
    public function disbursementAccountDetails(): array
    {
        return $this->account->disbursementAccountDetails();
    }

    /**
     * Get details of collection account
     * @return array
     */
    public function collectionAccountDetails(): array
    {
        return $this->account->collectionAccountDetails();
    }

    /**
     * Get account authorization code
     * @return array
     */
    public function accountAuthorizationCode(): array
    {
        return $this->account->authorizationCode();
    }

    /**
     * Create web redirect payment
     * @param array $data
     * @return array
     */
    public function createWebRedirectPayment(array $data): array
    {
        return $this->payment->createWebRedirectPayment($data);
    }

    /**
     * Create Mobile Money Charge
     * @param array $data
     * @return array
     */
    public function createMobilePayment(array $data): array
    {
        return $this->payment->createMobilePayment($data);
    }

    /**
     * Create Direct Charge via Tranzak QR Code (In-Store Payment)
     * @param array $data
     * @return array
     */
    public function createDirectPayment(array $data): array
    {
        return $this->payment->createDirectPayment($data);
    }

    /**
     * Displays payment request details
     * @param string $requestId
     * @return array
     */
    public function requestDetails(string $requestId): array
    {
        return $this->payment->requestDetails($requestId);
    }

    /**
     * Cancel payment request data
     * @param string $requestId
     * @return array
     */
    public function cancelPaymentRequest(string $requestId): array
    {
        return $this->payment->cancelPaymentRequest($requestId);
    }

    /**
     * Refresh transaction status
     * @param string $requestId
     * @return array
     */
    public function refreshTransactionStatus(string $requestId): array
    {
        return $this->payment->refreshTransactionStatus($requestId);
    }

    /**
     * Transfer to Tranzak Users
     * @param array $data
     * @return array
     */
    public function transferTranzakUser(array $data): array
    {
        return $this->transfer->transferTranzakUser($data);
    }

    /**
     * Transfer To Mobile Money
     * @param array $data
     * @return array
     */
    public function transferMobileMoney(array $data): array
    {
        return $this->transfer->transferMobileMoney($data);
    }

    /**
     * Transfer To CEMAC Bank Account
     * @param array $data
     * @return array
     */
    public function transferToBank(array $data): array
    {
        return $this->transfer->transferToBank($data);
    }

    /**
     * Get request details by transferId ID
     * @param string $transferId
     * @return array
     */
    public function transferDetails(string $transferId): array
    {
        return $this->transfer->transferDetails($transferId);
    }
}
