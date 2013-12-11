<?php

namespace Zenstruck\SlugifyBundle\Twig;

use Cocur\Slugify\Slugify;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class SlugifyExtension extends \Twig_Extension
{
    protected $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('slugify', array($this, 'slugify')),
        );
    }

    public function slugify($text, $separator = '-', $emptyValue = null)
    {
        return $this->slugify->slugify($text, $separator, $emptyValue);
    }

    public function getName()
    {
        return 'zenstruck_slugify';
    }

}
