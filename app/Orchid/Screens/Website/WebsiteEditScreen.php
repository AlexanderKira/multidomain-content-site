<?php

namespace App\Orchid\Screens\Website;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;
use App\Orchid\Layouts\Website\WebsiteEditLayout;
use Illuminate\Http\RedirectResponse;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class WebsiteEditScreen extends Screen
{
    public ?Website $website = null;

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            WebsiteEditLayout::class
        ];
    }

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(?Website $website): iterable
    {
        return [
            'website' => $website,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->website->exists ? __('Edit website') : __('Create website');
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return array_filter([
            Button::make(__('Save'))
                ->icon('check')
                ->method('save'),
            Button::make(__('Remove'))
                ->icon('trash')
                ->confirm(__('Confirm action'))
                ->method('remove')
                ->canSee($this->website->exists),
        ]);
    }

    public function save(WebsiteRequest $request, Website $website): RedirectResponse
    {

        $validated = $request->validated();

        $data = $validated['website'];

        $website->fill($data)->save();;

        Toast::info('Website created successfully');

        return redirect()->back();
    }

    public function remove(Website $website): RedirectResponse
    {
        $website->delete();

        Toast::info(__('Website was removed'));

        return redirect()->route('platform.websites');
    }

}
