<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SetCalendar extends Component
{
    public string $calendarName;

    public function mount()
    {
        $this->calendarName = Auth::user()->calendar_name;
    }

    public function render()
    {
        return view('livewire.set-calendar');
    }

    public function updated($name, $value)
    {
        if ($name == 'calendarName') {
            $user = Auth::user();
            $user->calendar_name = $value;
            $user->save();
        }
    }
}
