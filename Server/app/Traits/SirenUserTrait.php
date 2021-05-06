<?php

namespace App\Traits;

use App\User;
use SirenPHP\Action;
use SirenPHP\Field;

trait SirenUserTrait
{
    public function appendUserActions(&$sirenObject)
    {
        $user = User::where('hash', request()->header('hash'))->first();
        if (request()->header('hash') && $user) {
            $this->appendLoggedInActions($sirenObject, $user);
        } else {
            $this->appendLoggedOutActions($sirenObject);
        }
    }

    private function appendLoggedInActions(&$sirenObject, $user)
    {
        $action = new Action('Logout action', route('logout'));
        $action->setMethod("POST");
        $sirenObject->appendAction($action);

        $action = new Action('My favorites', route('users.favorites.index', $user->id));
        $action->setMethod("GET");
        $sirenObject->appendAction($action);

        $profile = $user->profile;
        if ($profile) {
            $action = new Action('My profile', route('profiles.show', $profile->id));
            $action->setMethod("GET");
            $sirenObject->appendAction($action);
        } else {
            $action = new Action('Create profile', route('profiles.store'));

            $action->setMethod("POST");

            $action->appendField(new Field("Name", "text", "name"));
            $action->appendField(new Field("Date of birth", "date", "birth_date"));
            $action->appendField(new Field("Gender", "text", "gender"));

            $sirenObject->appendAction($action);
        }
    }

    private function appendLoggedOutActions(&$sirenObject)
    {
        $action = new Action('Login action', route('login'));
        $action->setMethod("POST");
        $sirenObject->appendAction($action);
    }
}
