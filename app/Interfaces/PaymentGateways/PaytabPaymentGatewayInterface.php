<?php

namespace App\Interfaces\PaymentGateways;

interface PaytabPaymentGatewayInterface {

    public function generateIframe($amount);

}
