<?php

namespace App\Orchid\Layouts\Article;

use App\Models\Article;
use App\Models\Rubric;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class ArticleEditLayout extends Rows
{
    public function __construct(protected Article $article)
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
            Input::make('article.title')
                ->type('text')
                ->title('Title')
                ->placeholder('title')
                ->required(),
            Select::make('article.rubric_id')
                ->title(__('Rubric'))
                ->options(Rubric::query()->get()->pluck('title', 'id'))
                ->required(),
            Input::make('article.slug')
                ->type('text')
                ->title('Slug')
                ->placeholder('slug')
                ->required(),
            Input::make('article.author')
                ->type('text')
                ->title('Author')
                ->placeholder('author')
                ->required(),
            Quill::make('article.text')
                ->title(__('Text'))
                ->required(),
            CheckBox::make('article.is_publish')
                ->title('Published')
                ->sendTrueOrFalse(),
            Button::make(__('Save'))
                ->icon('check')
                ->type(Color::DEFAULT())
                ->method('save'),
        ];
    }
}
