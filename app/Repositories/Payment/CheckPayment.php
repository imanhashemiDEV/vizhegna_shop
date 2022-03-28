<?php

namespace App\Repositories\Payment;

class CheckPayment{

    public function checker($type)
    {
        if($type=='zarinpal'){
           return new PayWithZarinpal();
        }else if($type=='mellat'){
            return new PayWithMellat();
        }
    }

}
