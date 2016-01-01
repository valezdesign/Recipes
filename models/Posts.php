<?php namespace Valezdesign\Recipes\Models;

use Model;
use File;
use App;
use DB;
use Mail;

class Posts extends Model
{
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Validation;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    protected $table = 'recipes_posts';

    public $rules = [
        'title'   => 'required|between:1,100',
        'slug'    => ['between:1,100', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i'],
        'content' => 'required',
        'status'  => 'required|between:1,3|numeric'
    ];

    protected $slugs = ['slug' => 'title'];

    public $translatable = ['title', 'introductory', 'content'];

    protected $dates = ['published_at'];

    public function beforeCreate()
    {
        $this->statistics = 0;

        if ($this->published_at == '') {
            $this->published_at = date('Y-m-d H:i:00');
        }
    }

    public function beforeUpdate()
    {
        unset($this->statistics);
    }
}
