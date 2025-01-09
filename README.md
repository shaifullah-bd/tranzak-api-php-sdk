# tranzak-api-php-sdk
Tranzak gateway all api sdk in php
## Error Code
### 401 INVALID_ACCESS_TOKEN
## Payment Request Status Codes
### PENDING -Payment request is pending and may receive payment.
### SUCCESSFUL -The transaction was successfully completed.
### CANCELLED -The request is cancelled and may not receive payment.
### CANCELLED_BY_PAYER	-Request was cancelled by payer.
### FAILED	-The resulting transaction failed. The payment request may no longer receive payment.
### PAYMENT_IN_PROGRESS	-Transaction process has been triggered but has not yet completed.
### CANCELLED/REFUNDED	The transaction was voided.
### PAYER_REDIRECT_REQUIRED	The payer should be redirected to a web resource ( paymentAuthUrl ). This happens when the payer is required to perform an action due to security restriction or other reasons e.g input an OTP, fill in CAPTCHA, etc.
## Transfer Status Codes
### PENDING	Request has not been authorized and pending payment.
### SUCCESSFUL	The transaction was successfully completed.
### CANCELLED	The transfer was cancelled
### FAILED	The transfer failed.
### PROCESSING	The transfer is being processed by Tranzak internal system. This is applicable only in situations where the beneficiary is a mobile wallet or bank account.
