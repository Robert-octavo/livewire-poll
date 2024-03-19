<div>
    {{-- Do your work, then step back. --}}
    <form action="">
        <label for="">Poll Title</label>
        <input type="text" wire:model="title" class="border-gray-300">

        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        {{-- Current title: {{ $title }}<br> --}}

        <div class=" mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>

        <div class="mt-4">
            @foreach ($options as $index => $option)
                <label for="">Option {{ $index + 1 }}</label>
                <div class="flex gap-2">
                    <input type="text" wire:model="options.{{ $index }}">

                    <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
                @error('options.' . $index)
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            @endforeach
        </div>

        <div class="mt-4">
            <button class="btn" wire:click.prevent="createPoll">Create Poll</button>
        </div>
    </form>
</div>
