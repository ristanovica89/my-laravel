<?php

namespace App\Livewire;

use Livewire\Component;

class ShipmentAssignedList extends Component
{

    public int $count = 0;
    public int $amount = 1;
    public string $errMsgSub = '';

    public function render()
    {
        return view('livewire.shipment-assigned-list');
    }

    public function increment(): void
    {
        $this->count += $this->amount;
        $this->errMsgSub = '';
    }

    public function decrement(): void
    {
        if( $this->count < $this->amount){
            $this->errMsgSub = 'No negative value alowed!';
            return;
        }
        $this->count -= $this->amount;
        $this->errMsgSub = '';
    }


}
