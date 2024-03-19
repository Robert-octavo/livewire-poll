<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @forelse ($polls as $poll)
        <div class="mb-4">
            <h3 class="text-lg">{{ $poll->title }}</h3>
            @foreach ($poll->options as $option)
                <div class="mb-2">
                    <button class="btn">Vote</button>
                    {{ $option->name }} ({{ $option->votes->count() }})
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-gray-500">No polls available</div>
    @endforelse
</div>
