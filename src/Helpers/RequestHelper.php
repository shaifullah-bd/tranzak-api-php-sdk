<?php

namespace Bdtask\Tranzak\Helpers;

use Bdtask\Tranzak\Auth\TokenManager;

class RequestHelper
{
    private TokenManager $tokenManager;

    public function __construct(TokenManager $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * Get common headers for all request
     * @param array $additionalHeaders
     * @return array
     */
    public function getHeaders(array $additionalHeaders = []): array
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->tokenManager->getAuthToken(),
            'Content-Type' => 'application/json', // Add common headers
        ];

        return array_merge($headers, $additionalHeaders);
    }
}
