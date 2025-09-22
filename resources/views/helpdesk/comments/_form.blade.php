{{-- Comment form partial (Livewire-compatible) --}}
<form method="POST" action="{{ route('helpdesk.comments.store', ['ticket' => $ticket->id]) }}">
    @csrf

    <label for="comment_content" class="block">{{ __('messages.helpdesk.comments.add_label') }}</label>
    <textarea id="comment_content" name="content" class="myds-textarea" required aria-required="true"></textarea>

    <div class="mt-2">
        <x-myds.button type="submit">{{ __('messages.actions.post') }}</x-myds.button>
    </div>
</form>
