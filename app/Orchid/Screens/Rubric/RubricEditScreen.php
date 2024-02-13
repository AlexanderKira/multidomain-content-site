<?php

namespace App\Orchid\Screens\Rubric;

use App\Http\Requests\RubricRequest;
use App\Models\Rubric;
use App\Orchid\Layouts\Rubric\RubricEditLayout;
use Illuminate\Http\RedirectResponse;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class RubricEditScreen extends Screen
{

    public ?Rubric $rubric = null;

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            RubricEditLayout::class
        ];
    }

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(?Rubric $rubric): iterable
    {


        return [
            'rubric' => $rubric,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->rubric->exists ? __('Edit rubric') : __('Create rubric');
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
                ->canSee($this->rubric->exists),
        ]);
    }

    public function save(RubricRequest $request, Rubric $rubric): RedirectResponse
    {

        $validated = $request->validated();

        $data = $validated['rubric'];

        $rubric->fill($data)->save();

        Toast::info('Rubric created successfully');

        return redirect()->back();
    }

    public function remove(Rubric $rubric): RedirectResponse
    {
        $rubric->delete();

        Toast::info(__('Rubric was removed'));

        return redirect()->route('platform.rubrics');
    }

}
