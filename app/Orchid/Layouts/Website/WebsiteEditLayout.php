<?php

namespace App\Orchid\Layouts\Website;

use App\Models\Website;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class WebsiteEditLayout extends Rows
{
    public function __construct(protected Website $website)
    {
    }

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('website.domain')
                ->type('text')
                ->title('Domain')
                ->placeholder('domain')
                ->required(),
            Cropper::make('website.logo')
                ->minCanvas(500)
                ->maxWidth(250)
                ->maxHeight(100)
                ->title('Logo')
                ->maxFileSize(2)
                ->targetRelativeUrl(),
            Button::make(__('Save'))
                ->icon('check')
                ->type(Color::DEFAULT())
                ->method('save'),
        ];
    }
}
