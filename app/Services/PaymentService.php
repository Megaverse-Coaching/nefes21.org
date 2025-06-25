<?php
// app/Services/PaymentService.php
namespace App\Services;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    private string $merchantId;
    private string $merchantKey;
    private string $merchantSalt;
    private string $testMode;
    private string $merchantFailURL;
    private string $merchantOkURL;

    public function __construct()
    {
        $this->merchantId = config('paytr.merchant_id');
        $this->merchantKey = config('paytr.merchant_key');
        $this->merchantSalt = config('paytr.merchant_salt');
        $this->testMode = config('paytr.test_mode');
        $this->merchantFailURL = config('paytr.fail_url');
        $this->merchantOkURL = config('paytr.merchant_ok_url');
    }

    /**
     * @throws Exception
     */
    public function generateToken($amount, $user, $basket = [])
    {
        $params = [
            'merchant_id' => $this->merchantId,
            'user_ip' => request()->ip(),
            'merchant_oid' => time(),
            'email' => $user->email,
            'user_name' => $user->name,
            'user_address' => $user->address,
            'user_phone' => $user->phone,
            'payment_amount' => (int)$amount * 100,
            'user_basket' => base64_encode(json_encode($basket)),
            'debug_on' => 1,
            'no_installment' => 1,
            'max_installment' => 1,
            'currency' => 'TL',
            'test_mode' => $this->testMode,
            'merchant_fail_url' => $this->merchantFailURL,
            'merchant_ok_url' => $this->merchantOkURL
        ];

        $hashStr = $this->merchantId
            . $params['user_ip']
            . $params['merchant_oid']
            . $params['email']
            . $params['payment_amount']
            . $params['user_basket']
            . $params['no_installment']
            . $params['max_installment']
            . $params['currency']
            . $params['test_mode'];

        $params['paytr_token'] = base64_encode(hash_hmac('sha256', $hashStr . $this->merchantSalt, $this->merchantKey, true));

        try {
            $response = Http::asForm()->post('https://www.paytr.com/odeme/api/get-token', $params);
        } catch (RequestException $e) {
            Log::error('HTTP request failed', ['error' => $e->getMessage()]);
            throw new Exception('HTTP request failed: ' . $e->getMessage());
        }

        $result = $response->json();

        if ($result['status'] == 'success') {
            return $result['token'];
        } else {
            Log::error('Token oluşturma başarısız', ['reason' => $result['reason']]);
            throw new Exception('Token oluşturma başarısız: ' . $result['reason']);
        }
    }


}
