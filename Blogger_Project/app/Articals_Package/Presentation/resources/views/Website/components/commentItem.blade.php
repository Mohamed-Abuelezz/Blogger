<div>
    <div class="d-flex flex-start align-items-center">
        <img class="rounded-circle shadow-1-strong me-3" src="{{ asset('storage/' . $item->user->image) }}" alt="avatar"
            width="60" height="60" />
        <div>
            <h6 class="fw-bold text-primary mb-1">{{ $item->user->name }}</h6>
            <p class="text-muted small mb-0">
                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
            </p>
        </div>
    </div>

    <p class="mt-3 mb-4 pb-2">
        {{ $item->comment }}
    </p>

</div>
