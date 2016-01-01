<?php namespace Valezdesign\Recipes\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use DB;

class Posts extends ReportWidgetBase
{
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'valezdesign.recipes::lang.menu.news',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
            'total' => [
                'title'             => 'valezdesign.recipes::lang.widgets.show_total',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'active' => [
                'title'             => 'valezdesign.recipes::lang.widgets.show_active',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'inactive' => [
                'title'             => 'valezdesign.recipes::lang.widgets.show_inactive',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'draft' => [
                'title'             => 'valezdesign.recipes::lang.widgets.show_draft',
                'default'           => true,
                'type'              => 'checkbox'
            ]
        ];
    }

    protected function loadData()
    {
        $this->vars['active'] = DB::table('recipes_posts')->where('status', 1)->count();
        $this->vars['inactive'] = DB::table('recipes_posts')->where('status', 2)->count();
        $this->vars['draft'] = DB::table('recipes_posts')->where('status', 3)->count();
        $this->vars['total'] = $this->vars['active'] + $this->vars['inactive'] + $this->vars['draft'];
    }
}
