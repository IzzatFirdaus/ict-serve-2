<div id="reopen-modal" class="myds-modal" role="dialog" aria-labelledby="reopen-modal-title" aria-modal="true">
    <div class="myds-modal-content">
        <h2 id="reopen-modal-title">{{ __('messages.helpdesk.tickets.reopen_title') }}</h2>
        <form method="POST" action="{{ route('helpdesk.tickets.reopen', $ticket) }}">
            @csrf
            <label for="reopen_reason">{{ __('messages.helpdesk.tickets.reopen_reason') }}</label>
            <textarea id="reopen_reason" name="reopen_reason" class="myds-textarea"></textarea>

            <div class="mt-4">
                <x-myds.button type="submit">{{ __('messages.actions.reopen') }}</x-myds.button>
                <x-myds.button type="button" data-myds-dismiss="modal" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
            </div>
        </form>
    </div>
</div>
