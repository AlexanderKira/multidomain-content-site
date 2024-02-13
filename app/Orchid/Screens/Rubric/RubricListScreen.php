<?php

namespace App\Orchid\Screens\Rubric;

use App\Models\Rubric;
use App\Orchid\Layouts\Rubric\RubricListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class RubricListScreen extends Screen
{

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            RubricListLayout::class
        ];
    }

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'rubrics' => Rubric::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Rubrics';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return array_filter([
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.rubrics.create'),
        ]);
    }

    public function remove(Request $request): void
    {
        Rubric::findOrFail($request->get('id'))->delete();

        Toast::info(__('Rubric was removed'));
    }

}
