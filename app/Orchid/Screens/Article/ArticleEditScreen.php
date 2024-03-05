<?php

namespace App\Orchid\Screens\Article;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Orchid\Layouts\Article\ArticleEditLayout;
use App\Service\ArticleService;
use App\Service\Singletons\EmailService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class ArticleEditScreen extends Screen
{
    public ?Article $article = null;
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ArticleEditLayout::class
        ];
    }

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Article $article): iterable
    {
        return [
            'article' => $article,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->article->exists ? __('Edit article') : __('Create article');
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
                ->canSee($this->article->exists),
        ]);
    }

    public function save(ArticleRequest $request, Article $article): RedirectResponse
    {
        $validated = $request->validated();

        $data = $validated['article'];

        $article->fill($data)->save();

        if(boolval($data['is_publish']) === true){
            try {
                $this->articleService->notificationToTheEditor($data);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                Toast::error('Failed to send a confirmation email');
                return redirect()->back();
            }
        }

        Toast::info('Article created successfully');

        return redirect()->back();
    }

    public function remove(Article $article): RedirectResponse
    {
        $article->delete();

        Toast::info(__('Article was removed'));

        return redirect()->route('platform.articles');
    }

}
