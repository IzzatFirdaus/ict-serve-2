
{{--
    MYDS SweetAlert2 Blade Component
    --------------------------------
    Usage:
      <x-myds.swal
          title="Padam permohonan?"
          text="Tindakan ini tidak boleh diundur."
          icon="warning"
          variant="destructive"
          :show-cancel-button="true"
          confirm-button-text="Padam"
          cancel-button-text="Batal"
          :on-confirm="$onConfirmJsFunction"
          :on-cancel="$onCancelJsFunction"
      />

    - Triggers a SweetAlert2 dialog with MYDS styling and accessibility.
    - Use :on-confirm and :on-cancel to pass JS functions for button actions.
    - All props are optional; see resources/js/swal.js for details.
    - For Livewire, trigger via Alpine or emit JS event to showSwal().
--}}

@props([
    'title' => '',
    'text' => '',
    'icon' => 'info',
    'variant' => 'info',
    'confirmButtonText' => 'OK',
    'cancelButtonText' => 'Batal',
    'showCancelButton' => false,
    'onConfirm' => null,
    'onCancel' => null,
])

<script>
import { showSwal } from '@/js/swal';

export default {
    mounted() {
        showSwal({
            title: @js($title),
            text: @js($text),
            icon: @js($icon),
            variant: @js($variant),
            confirmButtonText: @js($confirmButtonText),
            cancelButtonText: @js($cancelButtonText),
            showCancelButton: @js($showCancelButton),
        }).then(result => {
            if (result.isConfirmed && @js($onConfirm)) {
                @js($onConfirm)();
            } else if (result.isDismissed && @js($onCancel)) {
                @js($onCancel)();
            }
        });
    }
}
</script>
