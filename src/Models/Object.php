<?php

namespace TypiCMS\Modules\Objects\Models;

use Dimsav\Translatable\Translatable;
use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;

class Object extends Base
{
    use Historable;
    use PresentableTrait;
    use Translatable;

    protected $presenter = 'TypiCMS\Modules\Objects\Presenters\ModulePresenter';

    protected $fillable = [
        'image',
        // Translatable columns
        'title',
        'slug',
        'status',
        'summary',
        'body',
    ];

    /**
     * Translatable model configs.
     *
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'slug',
        'status',
        'website',
        'summary',
        'body',
    ];

    protected $appends = ['status', 'title', 'thumb', 'website'];

    /**
     * Columns that are file.
     *
     * @var array
     */
    public $attachments = [
        'image',
    ];

    /**
     * Get attribute from translation table
     * and append it to main model attributes.
     *
     * @return string title
     */
    public function getWebsiteAttribute()
    {
        return $this->website;
    }
}