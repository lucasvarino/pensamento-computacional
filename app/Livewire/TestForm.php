<?php

namespace App\Livewire;

use App\Models\Question;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class TestForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('test'),
                TextInput::make('test2'),
                RichEditor::make('content')
            ])->statePath('data');

    }

    public function render()
    {
        return view('livewire.test-form');
    }

}
