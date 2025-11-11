<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Fake extends Form
{
    #[Validate(['required', 'min:3'])]
    public $name;

    #[Validate(['required', 'min:5', 'max:50'])]
    public $description;
}
