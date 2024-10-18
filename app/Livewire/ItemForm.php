<?php

namespace App\Livewire;

use App\Models\Kid;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Session;
use Livewire\Component;

class ItemForm extends Component
{
    public Kid $kid;
    public $passcode = '';
    #[Session(key: 'authenticated')]
    public $isAuthenticated;
    public $showAuthModal;

    #[Locked]
    private $correctPasscode = '1225';

    public function mount()
    {
        $this->isAuthenticated ? $this->showAuthModal = false : $this->showAuthModal = true;
    }

    public function checkPasscode(): void
    {
        if ($this->passcode === $this->correctPasscode) {
            $this->isAuthenticated = true;
            $this->showAuthModal = false;
        } else {
            Log::error('Wrong passcode');
        }
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.item-form');
    }
}
