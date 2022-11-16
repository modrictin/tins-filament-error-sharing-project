<?php

namespace App\Filament\Pages;

use App\Models\BookingSettings as BookingSettingsModel;
use App\Models\SimpleModel;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Pages\Page;

class Bug extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.bug';

    public SimpleModel $simpleModel;

    public function mount(){
        $this->simpleModel = new SimpleModel();
    }

    public function addSimpleModel()
    {
        $this->simpleModel = SimpleModel::make();
        $this->dispatchBrowserEvent('open-modal', ['id' => 'simpleUpdate']);

    }

    public function updateSimpleModel($id)
    {
        $this->simpleModel = SimpleModel::find($id);
        $this->dispatchBrowserEvent('open-modal', ['id' => 'simpleUpdate']);
        $this->dispatchBrowserEvent('close-modal', ['id' => 'simpleView']);
    }

    protected function getForms(): array
    {

        $form['main'] =
            $this->makeForm(

            )->schema([ViewField::make('1')->view('bug-field-view'),]);

        $form['bug']=$this->makeForm()->schema([

                DatePicker::make('simpleModel.exact_date')
                    ->label('This date will apply on:')
                    ->inlineLabel()
                    ->required()
                    ->displayFormat('d.m.Y')
                    ->visible(function () {
                        return $this->simpleModel->id === 1;
                    }),
                Grid::make(1)

                    ->schema([
                        DatePicker::make('simpleModel.from')
                            ->label('Rule applies from date:')
                            ->required()
                            ->inlineLabel()
                            ->displayFormat('d.m.Y'),
                        DatePicker::make('simpleModel.to')
                            ->label('To date:')
                            ->required()
                            ->inlineLabel()
                            ->minDate(function ($get) {
                                return $get('simpleModel.to');
                            })
                            ->displayFormat('d.m.Y'),

                        Toggle::make('simpleModel.something_toggle')
                            ->inline(false)
                            ->label('Toggle this')
                            ->inlineLabel()

                    ])->hidden(function () {
                        return $this->simpleModel->id === 1;
                    }),

            ]);


        return $form;
    }

}
