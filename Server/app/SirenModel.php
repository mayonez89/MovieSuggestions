<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use SirenPHP\Action;
use SirenPHP\Entity;
use SirenPHP\Field;

abstract class SirenModel extends Model
{

    public static function getSirenEntity(self $instance)
    {
        $entity = self::constructSirenEntity($instance);
        self::appendSirenActions($instance, $entity);
        self::appendSirenEntities($instance, $entity);
        return $entity;
    }

    private static function constructSirenEntity(self $instance)
    {
        return new Entity(
            route($instance->getTable().'.show', $instance->getKey()),
            $instance->getAttributes(),
            [get_class($instance)]
        );
    }


    const M_SHOW = 'show';
    const M_INDEX = 'index';
    const M_STORE = 'store';
    const M_UPDATE = 'update';
    const M_DESTROY = 'destroy';
    const METHODS = [
        self::M_INDEX => 'GET',
//        self::M_INDEX => 'GET|HEAD',
        self::M_STORE => 'POST',
        self::M_UPDATE => 'PUT',
//        self::M_UPDATE => 'PUT|PATCH',
        self::M_SHOW => 'GET',
//        self::M_SHOW => 'GET|HEAD',
        self::M_DESTROY => 'DELETE',
    ];
    protected static abstract function getCRUD();

    public static function appendSirenActions(self $instance, Entity &$entity)
    {
        foreach(static::getCRUD() as $method)
        {
            $entity->appendAction(self::actions($instance, $method));
        }
    }

    private static function actions(self $instance, $method) {
        $name = static::getTableName() . '.' . $method;
        $action = new Action($name,
            in_array($method, [self::M_INDEX, self::M_STORE]) ? route($name) : route($name, $instance->getKey())
        );
        $action->setMethod(self::METHODS[$method]);
        if(in_array($method, [self::M_UPDATE, self::M_STORE])) {
            foreach($instance->getAttributes() as $attribute => $value)
            {
//                if($method===self::M_UPDATE) dd($value);
                if(!in_array($attribute, [$instance->getKey(), 'created_at', 'updated_at', 'deleted_at'])) {
                    $action->appendField(new Field($attribute, null, ($method===self::M_UPDATE ? $value : null)));
                }
            }
        }
        return $action;
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    private static function appendSirenEntities(self $instance, Entity &$entity)
    {
        foreach($instance->getRelations() as $relationName => $collection)
        {
            if(count($collection)>0)
            {
                $ent = new Entity(route($instance->getTable() . "." . $relationName . ".index", $instance->getKey()), [$relationName]);
                $entity->appendEntity([], $ent);
            }
        }
    }
}
