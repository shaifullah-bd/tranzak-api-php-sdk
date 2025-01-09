<?php

namespace Bdtask\Tranzak\Services;

use Bdtask\Tranzak\Helpers\RequestHelper;
use Bdtask\Tranzak\Http\HttpClient;
use Bdtask\Tranzak\Auth\TokenManager;

class Payment
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
     * Create web redirect payment
     * @param array $data
     * @return array
     */
    public function createWebRedirectPayment(array $data): array
    {
        $endpoint = "/xp021/v1/request/create";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Create mobile wallet charge
     * @param array $data
     * @return array
     */
    public function createMobilePayment(array $data): array
    {
        $endpoint = "/xp021/v1/request/create-mobile-wallet-charge";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Create Direct Charge via Tranzak QR Code
     * @param array $data
     * @return array
     */
    public function createDirectPayment(array $data): array
    {
        $endpoint = "/xp021/v1/request/create-in-store-charge";
        $headers = $this->requestHelper->getHeaders();

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Get request details by request ID
     * @param string $requestId
     * @return array
     */
    public function requestDetails(string $requestId): array
    {
        $endpoint = "/xp021/v1/request/details";
        $headers = $this->requestHelper->getHeaders();
        $params = [
            "requestId" => $requestId
        ];

        return $this->httpClient->get($endpoint, $params, $headers);
    }

    /**
     * Cancel a payment request
     * @param string $requestId
     * @return array
     */
    public function cancelPaymentRequest(string $requestId): array
    {
        $endpoint = "/xp021/v1/request/cancel";
        $headers = $this->requestHelper->getHeaders();
        $data = [
            "requestId"=> $requestId
        ];

        return $this->httpClient->post($endpoint, $data, $headers);
    }

    /**
     * Refresh transaction  status
     * @param string $requestId
     * @return array
     */
    public function refreshTransactionStatus(string $requestId): array
    {
        $endpoint = "/xp021/v1/request/refresh-transaction-status";
        $headers = $this->requestHelper->getHeaders();
        $data = [
            "requestId"=> $requestId
        ];

        return $this->httpClient->post($endpoint, $data, $headers);
    }
}