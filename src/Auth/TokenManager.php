<?php

namespace Bdtask\Tranzak\Auth;

use Bdtask\Tranzak\Http\HttpClient;
use GuzzleHttp\Exception\RequestException;
use Bdtask\Tranzak\Exceptions\AuthException;

class TokenManager
{
    private string $appId;
    private string $appKey;
    public string $baseUrl;
    private string $authToken = '';
    private int $expiryTime = 0;
    private HttpClient $httpClient;

    public function __construct(string $appId, string $appKey, string $baseUrl)
    {
        $this->appId = $appId;
        $this->appKey = $appKey;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->httpClient = new HttpClient($this->baseUrl);
    }

    /**
     * Get api Bearer access token
     * @return string
     */
    public function getAuthToken(): string
    {
        if (empty($this->authToken)) {
            $this->authenticate();
        }
        return $this->authToken;
    }

    public function get(): string
    {
        return $this->authToken;
    }

    /**
     * Access authenticate request
     * @throws \Bdtask\Tranzak\Exceptions\AuthException
     * @return void
     */
    private function authenticate(): void
    {
        $data = [
            'appId' => $this->appId,
            'appKey' => $this->appKey,
        ];

        try {
            $response = $this->httpClient->post('/auth/token', $data);
            if (isset($response['data']['token']) && isset($response['data']['expiresIn'])) {
                $this->authToken = $response['data']['token'];
                $this->expiryTime = $response['data']['expiresIn'];
            } else {
                throw new AuthException('Token not found in response');
            }
        } catch (RequestException $e) {
            throw new AuthException("Authentication failed: " . $e->getMessage());
        }
    }

    public function refreshToken(): void
    {
        $this->authToken = ''; // Clear the current token to force re-authentication
        $this->authenticate();
    }

    /**
     * Set if have already generated token
     * @param string $token
     * @return void
     */
    public function setAuthToken(string $token): void
    {
        $this->authToken = $token;
    }

    /**
     * Get access token expiry time
     * @return int
     */
    public function getExpiryTime(): int
    {
        return $this->expiryTime;
    }
}