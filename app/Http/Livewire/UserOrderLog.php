<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\WithPagination;

class UserOrderLog extends Component
{
    use WithPagination;

    public $searchTerm;
    public $OrderId;

    public function selectOrder($productId, $action)
    {
        $this->OrderId = $productId;
        
        if ($action == 'view') {
            $this->emit('getModelId', $this->OrderId);

            // $this->createUpdateModal();
        }
    }

    public function render()
    {
        $orders = Order::whereHas('userid' , function($q){
            $q->where('user_id','=', auth()->user()->id);
         })->where(function($query){
            if(!empty($this->searchTerm)){
                $query->where('name', 'like', '%'.$this->searchTerm.'%');
                $query->orWhere('tracking_no', 'like', '%'.$this->searchTerm.'%');
            }
         })->latest()->paginate(5);
        
        return view('livewire.user-order-log', ['orders' => $orders]);
    }
}
