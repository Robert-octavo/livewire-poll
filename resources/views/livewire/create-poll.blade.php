<div>
    {{-- Do your work, then step back. --}}
    <form action="">
        <label for="">Poll Title</label>
        <input type="text" wire:model="title" class="border-gray-300">

        Current title: {{ $title }}<br>

        <div class=" mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div class="mt-4">
            @foreach ($options as $index => $option)
                <label for="">Option {{ $index + 1 }}</label>
                <input type="text" wire:model="options.{{ $index }}">

                <button wire:click.prevent="removeOption({{ $index }})">-</button>
            @endforeach
        </div>
    </form>
</div>
