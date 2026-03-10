<div>
    <p>Clicked: {{ $count }}</p>

    <p style="color:red;">{{ $errMsgSub }}</p>
    <button wire:click="increment" 
    class="bg-accent text-black text-xs px-3 py-1 rounded-lg hover:bg-accent/80 transition">Add</button>
    <button wire:click="decrement" 
    class="bg-accent text-black text-xs px-3 py-1 rounded-lg hover:bg-accent/80 transition">Substract</button>

    <input type="number" min="1" wire:model.live="amount"/>
</div>
