<?php

namespace App\Orchid\Screens\Website;

use App\Models\Website;
use App\Orchid\Layouts\Website\WebsiteListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class WebsiteListScreen extends Screen
{

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            WebsiteListLayout::class
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
            'websites' => Website::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Websites';
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
                ->route('platform.websites.create'),
        ]);
    }


    public function remove(Request $request): void
    {
        Website::findOrFail($request->get('id'))->delete();

        Toast::info(__('Website was removed'));
    }
}
