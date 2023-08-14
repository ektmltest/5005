<?php

namespace App\Services\Transactions;

use App\Interfaces\PaymentGateways\PaytabPaymentGatewayInterface;
use Illuminate\Support\Facades\Log;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PaytabService implements PaytabPaymentGatewayInterface {

    private $callback_url;
    private $return_url;

    public function __construct() {
        $this->callback_url = route('api.payment.callback');
        $this->return_url = null;
    }

    public function generateIframe($amount) {

        $pay = paypage::sendPaymentCode('all')
                ->sendTransaction('sale')
                ->sendCart(auth()->user()->id, $amount, 'charging in account user with name: ' . auth()->user()->full_name)
                ->sendCustomerDetails(auth()->user()->full_name, auth()->user()->email, auth()->user()->phone, null, null, null, null, null, request()->ip())
                ->sendHideShipping(on: true)
                ->sendURLs($this->return_url, $this->callback_url)
                ->sendLanguage(app()->getLocale())
                ->sendFramed(on: true)
                ->create_pay_page();

        return $pay;

    }

}
