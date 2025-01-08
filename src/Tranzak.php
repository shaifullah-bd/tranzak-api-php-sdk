<?php

namespace Bdtask\Tranzak;

use Bdtask\Tranzak\Auth\TokenManager;
use Bdtask\Tranzak\Services\Account;

class Tranzak
{
    private TokenManager $tokenManager;
    private Account $account;

    public function __construct(string $appId, string $appKey, string $baseUrl)
    {
        $this->tokenManager = new TokenManager($appId, $appKey, $baseUrl);
        $this->account = new Account($this->tokenManager);
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
     * Get sandbox account authorization code
     * @return array
     */
    public function accountAuthorizationCode(): array
    {
        return $this->account->authorizationCode();
    }
}
