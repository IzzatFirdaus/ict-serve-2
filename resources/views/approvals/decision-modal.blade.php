<div id="decision-modal" class="myds-modal" role="dialog" aria-labelledby="decision-modal-title" aria-modal="true">
    <div class="myds-modal-content">
        <h2 id="decision-modal-title">{{ __('messages.approvals.decision.title') }}</h2>
        <form method="POST" action="{{ route('approvals.decide', $approval) }}">
            @csrf
            <label for="decision">{{ __('messages.approvals.decision.label') }}</label>
            <select id="decision" name="decision" class="myds-select">
                <option value="approve">{{ __('messages.approvals.decision.approve') }}</option>
                <option value="reject">{{ __('messages.approvals.decision.reject') }}</option>
            </select>

            <label for="comment">{{ __('messages.approvals.decision.comment') }}</label>
            <textarea id="comment" name="comment" class="myds-textarea"></textarea>

            <div class="mt-4">
                <x-myds.button type="submit">{{ __('messages.actions.submit') }}</x-myds.button>
                <x-myds.button type="button" data-myds-dismiss="modal" variant="secondary">{{ __('messages.actions.cancel') }}</x-myds.button>
            </div>
        </form>
    </div>
</div>
