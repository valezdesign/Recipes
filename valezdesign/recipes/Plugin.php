<?php namespace Valezdesign\Recipes;

use System\Classes\PluginBase;
use Backend;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Recipes',
            'description' => 'valezdesign.recipes::lang.plugin.description',
            'author'      => 'valezdesign.news::lang.plugin.author',
            'icon'        => 'icon-cutlery',
            'homepage'    => 'https://www.valezdesign.com'
        ];
    }

    public function registerNavigation()
    {
        return [
            'news' => [
                'label'       => 'valezdesign.recipes::lang.menu.news',
                'url'         => Backend::url('valezdesign/recipes/posts'),
                'icon'        => 'icon-cutlery',
                'permissions' => ['valezdesign.recipes.*'],
                'order'       => 500,

                'sideMenu' => [
                    'posts' => [
                        'label'       => 'valezdesign.recipes::lang.menu.posts',
                        'url'         => Backend::url('valezdesign/recipes/posts'),
                        'icon'        => 'icon-cutlery',
                        'permissions' => ['valezdesign.recipes.posts']
                    ],
                ]
            ]
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Valezdesign\Recipes\ReportWidgets\Posts' => [
                'label'   => 'valezdesign.recipes::lang.widget.posts',
                'context' => 'dashboard'
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'Valezdesign\Recipes\Components\Posts' => 'posts',
            'Valezdesign\Recipes\Components\Post'  => 'post',
            'Valezdesign\Recipes\Components\Form'  => 'form',
            'Valezdesign\Recipes\Components\Stat'  => 'stat'
        ];
    }


    public function registerPermissions()
    {
        return [
            'valezdesign.recipes.posts' => [
                'tab'   => 'valezdesign.recipes::lang.menu.recipes',
                'label' => 'valezdesign.recipes::lang.permission.posts'
            ],
        ];
    }
}
