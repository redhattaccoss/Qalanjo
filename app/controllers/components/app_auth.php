<?php
App::import('Component', 'AuthComponent');
class AppAuthComponent extends AuthComponent {

    function identify($user = null, $conditions = null) {
        $models = array('Member');
        foreach ($models as $model) {
            $this->userModel = $model; // switch model
            $result = parent::identify($user, $conditions); // let cake do it's thing
            if ($result) {
                return $result; // login success
            }
        }
        return null; // login failure
    }
}