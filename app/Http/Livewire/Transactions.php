<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Transactions extends Component
{
    use WithPagination;
    public $searchTerm;
    public $OrderId;
    public $action;
    public $selectStatus;

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    public function selectOrder($productId, $action)
    {
        $this->OrderId = $productId;
        $this->action = $action;
        
        if ($action == 'view') {
            $this->emit('getModelId', $this->OrderId);

            // $this->createUpdateModal();
        }elseif($action == 'status'){
            $this->status = Order::findOrFail($this->OrderId);
            $this->emit('refreshParent');
            // These will reset our error bags
            $this->resetErrorBag();
            $this->resetValidation();
        }
    }

    public function updateStatus()
    {
        $data = [
            'status' => $this->selectStatus
        ];

        $orderStatus = Order::findOrFail($this->OrderId);

        $orderStatus->update($data);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $orders = DB::table('orders')->where(function($query){
            if(!empty($this->searchTerm)){
                $query->where('name', 'like', '%'.$this->searchTerm.'%');
                $query->orWhere('tracking_no', 'like', '%'.$this->searchTerm.'%');
            }
         })->latest()->paginate(5);

        return view('livewire.transactions', ['orders' => $orders]);
    }
}
