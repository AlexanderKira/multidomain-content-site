<?php

namespace App\Orchid\Layouts\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ArticleListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'articles';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id'),
            TD::make('slug'),
            TD::make('title'),
            TD::make('author'),
            TD::make('is_publish', 'Published')
                ->render(function (Article $article) {
                    return $article->is_publish ? 'Yes' : 'No';
                }),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->canSee(Auth::user()->hasAccess('platform.websites.write'))
                ->render(function (Article $article) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->canSee(Auth::user()->hasAccess('platform.websites.write'))
                        ->list([
                            Link::make(__('Edit'))
                                ->icon('pencil')
                                ->route('platform.articles.edit', $article),
                            Button::make(__('Remove'))
                                ->icon('trash')
                                ->confirm(__('Confirm action'))
                                ->method('remove', [
                                    'id' => $article->id,
                                ]),
                        ]);
                }),
        ];
    }
}
