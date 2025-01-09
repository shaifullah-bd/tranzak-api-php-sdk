<?php

namespace Bdtask\Tranzak\Services;

use Bdtask\Tranzak\Helpers\RequestHelper;
use Bdtask\Tranzak\Http\HttpClient;
use Bdtask\Tranzak\Auth\TokenManager;

class Transfer
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
     * Transfer to Tranzak Users
     * @param array $data
     * @return array
     */
    public function transferTranzakUser(array $data): array
    {
        $endpoint = "/xp021/v1/transfer/to-internal-user";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Transfer To Mobile Money
     * @param array $data
     * @return array
     */
    public function transferMobileMoney(array $data): array
    {
        $endpoint = "/xp021/v1/transfer/to-mobile-wallet";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Transfer To CEMAC Bank Account
     * @param array $data
     * @return array
     */
    public function transferToBank(array $data): array
    {
        $endpoint = "/xp021/v1/transfer/to-bank-account";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Get request details by transferId ID
     * @param string $transferId
     * @return array
     */
    public function transferDetails(string $transferId): array
    {
        $endpoint = "/xp021/v1/request/details";
        $headers = $this->requestHelper->getHeaders();
        $params = [
            "transferId" => $transferId
        ];

        return $this->httpClient->get($endpoint, $params, $headers);
    }
}