<div id="close-modal" class="myds-modal" role="dialog" aria-labelledby="close-modal-title" aria-modal="true">
    <div class="myds-modal-content">
        <h2 id="close-modal-title">{{ __('messages.helpdesk.tickets.close_title') }}</h2>
        <form method="POST" action="{{ route('helpdesk.tickets.close', $ticket) }}">
            @csrf
            <label for="closing_notes">{{ __('messages.helpdesk.tickets.closing_notes') }}</label>
            <textarea id="closing_notes" name="closing_notes" class="myds-textarea"></textarea>

            <div class="mt-4">
                <x-myds.button type="submit" variant="danger">{{ __('messages.actions.close') }}</x-myds.button>
                <x-myds.button type="button" data-myds-dismiss="modal" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
            </div>
        </form>
    </div>
</div>
