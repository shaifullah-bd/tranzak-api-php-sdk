<?php

namespace Bdtask\Tranzak\Services;

use Bdtask\Tranzak\Helpers\RequestHelper;
use Bdtask\Tranzak\Http\HttpClient;
use Bdtask\Tranzak\Auth\TokenManager;

class Account
{
    private TokenManager $tokenManager;
    private HttpClient $httpClient;
    private RequestHelper $requestHelper;

    public function __construct(TokenManager $tokenManager)
    {
        $this->tokenManager = $tokenManager;
        $this->httpClient = new HttpClient($this->tokenManager->baseUrl);
        $this->requestHelper = new RequestHelper($this->tokenManager);

    }

    /**
     * Get account details by account Id
     * @param string $accountId
     * @return array
     */
    public function details(string $accountId): array
    {
        $endpoint = "/xp021/v1/account/details";
        $headers = $this->requestHelper->getHeaders();
        $params = [
            "accountId"=> $accountId,
        ];

        return $this->httpClient->get($endpoint, $params, $headers);
    }

    /**
     * Get all Merchant sub account list
     * @return array
     */
    public function merchantSubList(): array
    {
        $endpoint = "/mapi/xp021/v1/account/accounts";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->get($endpoint, [], $headers);
    }

    /**
     * Get Disbursement account details
     * @return array
     */
    public function disbursementAccountDetails(): array
    {
        $endpoint = "/xp021/v1/account/payout-account-details";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, [], $headers);
    }

    /**
     * Get collection account details
     * @return array
     */
    public function collectionAccountDetails(): array
    {
        $endpoint = "/xp021/v1/account/collection-account-details";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, [], $headers);
    }

    /**
     * AVAILABLE ONLY ON SANDBOX ENVIRONMENT Generates authorization code that may be used for testing in-store (in-person) direct charge. 
     * See the Payment Request section to learn more on in-person/in-store direct charge.
     * @return array
     */
    public function authorizationCode(): array
    {
        $endpoint = "/xp021/v1/account/generate-auth-code";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, [], $headers);
    }
}