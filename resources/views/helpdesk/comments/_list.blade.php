{{-- Comments thread partial --}}
<div class="space-y-4" aria-live="polite">
    @foreach ($comments as $comment)
        <div class="myds-card" id="comment-{{ $comment->id }}">
            <div class="flex items-start gap-3">
                <div class="font-semibold">{{ $comment->user->name }}</div>
                <div class="text-xs text-muted">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
            <div class="mt-2">{!! nl2br(e($comment->content)) !!}</div>
        </div>
    @endforeach
</div>
