<?php namespace Valezdesign\Recipes\Components;

use Cms\Classes\ComponentBase;
use DB;

class Stat extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'valezdesign.recipes::lang.component.stat'
        ];
    }

    public function onRun()
    {
        $stat = DB::table('recipes_posts')->where('slug', $this->param('slug'))->pluck('statistics');
        DB::table('recipes_posts')->where('slug', $this->param('slug'))->update(array('statistics' => ++$stat));
    }
}
