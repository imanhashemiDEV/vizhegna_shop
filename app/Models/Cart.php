<?php

namespace App\Models;



class Cart
{

   public $items=null;
   public $totalQty=0;
   public $totalPrice=0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addToCart($item,$id,$qty)
    {
        $storeItem =['qty'=>0,'price'=>$item->price,'item'=>$item];

        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storeItem = $this->items[$id];
            }
        }

        $storeItem['qty'] +=$qty;
        $storeItem['price'] *=  $qty;
        $this->items[$id]=$storeItem;
        $this->totalQty +=  $qty;
        $this->totalPrice +=  $storeItem['price'];

    }

    public function removeFromCart($item,$id)
    {
        $this->totalQty --;
        $this->totalPrice -=  $item['price'] * $this->items[$id]['qty'];

        if($this->items){
            if(array_key_exists($id,$this->items)){
               unset($this->items[$id]);
            }
        }

    }

}
