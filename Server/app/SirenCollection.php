<?php

namespace App;

use Illuminate\Support\Collection;
use SirenPHP\Entity;

class SirenCollection
{
    public static function getSirenCollection(Collection $coll, $href, $class)
    {
        $collection = new Entity(
            $href, ['count' => count($coll)], ['class' => $class]
        );

        foreach($coll as $item)
        {
            $item = $class::getSirenEntity($item);
            $collection->appendEntity([], $item);
        }

        return $collection;
    }
}
