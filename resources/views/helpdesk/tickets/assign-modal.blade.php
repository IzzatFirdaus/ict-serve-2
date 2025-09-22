<div id="assign-modal" class="myds-modal" role="dialog" aria-labelledby="assign-modal-title" aria-modal="true">
    <div class="myds-modal-content">
        <h2 id="assign-modal-title">{{ __('messages.helpdesk.tickets.assign_title') }}</h2>
        <form method="POST" action="{{ route('helpdesk.tickets.assign', $ticket) }}">
            @csrf
            <label for="assignee">{{ __('messages.helpdesk.tickets.assignee') }}</label>
            <select id="assignee" name="assignee" class="myds-select">
                @foreach($staff as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>

            <div class="mt-4">
                <x-myds.button type="submit">{{ __('messages.actions.assign') }}</x-myds.button>
                <x-myds.button type="button" data-myds-dismiss="modal" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
            </div>
        </form>
    </div>
</div>
