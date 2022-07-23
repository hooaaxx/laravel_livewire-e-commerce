<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\OrderItem;

class ShowOrderProducts extends Component
{
    public $totalQty;
    public $totalPrice;
    public $modelId;
    public $product_id;

    protected $listeners = [
        'getModelId',
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;
    }

    public function render()
    {
        // $orderProducts = OrderItem::where('order_id','=', $this->modelId)->get();
        $orderProducts = OrderItem::whereHas('orderProd' , function($q){
            $q->where('order_id','=', $this->modelId);
        })->get();

        return view('livewire.show-order-products', ['orderProducts' => $orderProducts]);
    }
}
