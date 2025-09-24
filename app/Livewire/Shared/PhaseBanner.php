<?php

namespace App\Livewire\Shared;

use Livewire\Component;

class PhaseBanner extends Component
{
    public bool $dismissed = false;

    public function mount(): void
    {
        $this->dismissed = session('phase_banner_dismissed', false);
    }

    public function dismiss(): void
    {
        $this->dismissed = true;
        session(['phase_banner_dismissed' => true]);
    }

    public function render()
    {
        return view('livewire.shared.phase-banner');
    }
}
