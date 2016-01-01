<?php namespace Valezdesign\Recipes\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Lang;
use Valezdesign\Recipes\Models\Post as NewsPost;
use Redirect;

class Posts extends ComponentBase
{
    public $posts;

    public $pageParam;

    public $noPostsMessage;

    public $postPage;

    public $sortOrder;

    public function componentDetails()
    {
        return [
            'name'        => 'valezdesign.recipes::lang.settings.posts_title',
            'description' => 'valezdesign.recipes::lang.settings.posts_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'pageNumber' => [
                'title'       => 'valezdesign.recipes::lang.settings.posts_pagination',
                'description' => 'valezdesign.recipes::lang.settings.posts_pagination_description',
                'type'        => 'string',
                'default'     => '{{ :page }}'
            ],
            'postsPerPage' => [
                'title'             => 'valezdesign.recipes::lang.settings.posts_per_page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'valezdesign.recipes::lang.settings.posts_per_page_validation',
                'default'           => '10'
            ],
            'noPostsMessage' => [
                'title'             => 'valezdesign.recipes::lang.settings.posts_no_posts',
                'description'       => 'valezdesign.recipes::lang.settings.posts_no_posts_description',
                'type'              => 'string',
                'default'           => Lang::get('valezdesign.recipes::lang.settings.posts_no_posts_found'),
                'showExternalParam' => false
            ],
            'sortOrder' => [
                'title'       => 'valezdesign.recipes::lang.settings.posts_order',
                'description' => 'valezdesign.recipes::lang.settings.posts_order_description',
                'type'        => 'dropdown',
                'default'     => 'published_at desc',
                'options'     => ['title asc' => Lang::get('valezdesign.recipes::lang.sorting.title_asc'), 'title desc' => Lang::get('valezdesign.recipes::lang.sorting.title_desc'), 'created_at asc' => Lang::get('valezdesign.recipes::lang.sorting.created_at_asc'), 'created_at desc' => Lang::get('valezdesign.recipes::lang.sorting.created_at_desc'), 'updated_at asc' => Lang::get('valezdesign.recipes::lang.sorting.updated_at_asc'), 'updated_at desc' => Lang::get('valezdesign.recipes::lang.sorting.updated_at_desc'), 'published_at asc' => Lang::get('valezdesign.recipes::lang.sorting.published_at_asc'), 'published_at desc' => Lang::get('valezdesign.recipes::lang.sorting.published_at_desc')]
            ],
            'postPage' => [
                'title'       => 'valezdesign.recipes::lang.settings.posts_post',
                'description' => 'valezdesign.recipes::lang.settings.posts_post_description',
                'type'        => 'dropdown',
                'default'     => 'news/post'
            ]
        ];
    }

    public function getPostPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun()
    {
        $this->prepareVars();

        $this->posts = $this->page['posts'] = $this->listPosts();

        if ($pageNumberParam = $this->paramName('pageNumber')) {
            $currentPage = $this->property('pageNumber');

            if ($currentPage > ($lastPage = $this->posts->lastPage()) && $currentPage > 1) {
                return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
            }
        }
    }

    protected function prepareVars()
    {
        $this->pageParam = $this->page['pageParam'] = $this->paramName('pageNumber');
        $this->noPostsMessage = $this->page['noPostsMessage'] = $this->property('noPostsMessage');

        $this->postPage = $this->page['postPage'] = $this->property('postPage');
    }

    protected function listPosts()
    {
        $posts = NewsPost::listFrontEnd([
            'page'    => $this->property('pageNumber'),
            'sort'    => $this->property('sortOrder'),
            'perPage' => $this->property('postsPerPage')
        ]);

        return $posts;
    }
}
