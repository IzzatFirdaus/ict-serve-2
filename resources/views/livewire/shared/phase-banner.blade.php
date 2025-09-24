@if (!$dismissed)
<div
    class="bg-warning-50 py-2 border-b border-warning-200 text-warning-700 text-center text-xs font-medium"
    role="status"
>
    <span class="inline-block bg-warning-200 text-warning-900 rounded px-2 py-1 mr-2">
        <i class="fa-solid fa-triangle-exclamation myds-text--warning myds-icon myds-icon--md" aria-hidden="true" role="img"></i>
        {{ __('messages.phase.beta') }}
    </span>
    {{ __('messages.phase.testing_notice') }}
    <a href="#feedback" class="underline">{{ __('messages.phase.feedback') }}</a>
    <button
        wire:click="dismiss"
        class="ml-4 myds-btn myds-btn--sm myds-btn--tertiary myds-focus-ring"
        aria-label="{{ __('messages.phase.dismiss') }}"
        type="button"
    >
        <i class="fa-solid fa-xmark myds-icon myds-icon--sm" aria-hidden="true"></i>
        <span class="sr-only">{{ __('messages.phase.dismiss') }}</span>
    </button>
</div>
@endif
