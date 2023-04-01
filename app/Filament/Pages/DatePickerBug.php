<?php

namespace App\Filament\Pages;

use App\Models\DatepickerBugModel;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;

class DatePickerBug extends Page
{

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.date-picker-bug';
    public DatepickerBugModel $record;
    public string $test = '';

    public function mount(){
        $this->record = new DatepickerBugModel();
        $this->record->date = now();
    }

    protected function getFormSchema(): array
    {
        return [

            Section::make('Bug form')
                ->description('Bug occurs when you set your default timezone to CET. If you set it to UTC, the bug does not occur. On each request, the date is set to the previous day.')
                ->schema([
                    DatePicker::make('record.date'),
                    TextInput::make('test')
                        ->label('Write something to trigger the request')
                        ->reactive()
                ]),

        ];
    }


}
