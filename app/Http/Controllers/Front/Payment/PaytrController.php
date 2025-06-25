<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PaytrController extends Controller
{
    private string $merchantId = env('MERCHANT_ID');
    private string $merchantKey = env('MERCHANT_KEY');
    private string $merchantSalt = env('MERCHANT_SALT');

    public function createPayment(Request $request)
    {
        // Ödeme bilgilerini alın
        $amount = $request->input('amount');
        $email = $request->input('email');

        // Token oluşturun
        $token = $this->generateToken($amount, $email);

        // Ödeme formunu döndürün
        return view('payment_form', ['token' => $token]);
    }

    private function generateToken($amount, $email)
    {
        // Parametreleri hazırlayın
        $params = [
            'merchant_id' => $this->merchantId,
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'merchant_oid' => time(),
            'email' => $email,
            'payment_amount' => $amount * 100, // Kuruş cinsinden
            'user_basket' => base64_encode(json_encode([
                
            ])),
            'debug_on' => 1,
            'no_installment' => 1,
            'max_installment' => 1,
            'currency' => 'TL',
            'test_mode' => 0,
        ];

        // Hash oluşturun
        $hash = base64_encode(hash_hmac('sha256', implode('|', $params) . $this->merchantSalt, $this->merchantKey, true));
        $params['paytr_token'] = $hash;


        // Laravel HTTP istemcisini kullanarak token isteği gönderin
        $response = Http::asForm()->post('https://www.paytr.com/odeme/api/get-token', $params);

        // Yanıtı işleyin
        $result = $response->json();

        if ($result['status'] == 'success') {
            return $result['token'];
        } else {
            throw new \Exception('Token oluşturma başarısız: ' . $result['reason']);
        }

    }
}

