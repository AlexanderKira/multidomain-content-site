<?php

namespace App\Orchid\Layouts\Rubric;

use App\Models\Rubric;
use App\Models\Website;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class RubricEditLayout extends Rows
{
    public function __construct(protected Rubric $rubric)
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
            Input::make('rubric.title')
                ->type('text')
                ->title('Title')
                ->placeholder('Title')
                ->required(),
            Select::make('rubric.website_id')
                ->title(__('Website'))
                ->options(Website::query()->get()->pluck('domain', 'id'))
                ->required(),
            Input::make('rubric.slug')
                ->type('text')
                ->title('Slug')
                ->placeholder('Slug')
                ->required(),
            CheckBox::make('rubric.is_publish')
                ->title('Published')
                ->sendTrueOrFalse(),
            Button::make(__('Save'))
                ->icon('check')
                ->type(Color::DEFAULT())
                ->method('save'),
        ];
    }
}
