<?php

namespace api\modules\v1\actions;

use Yii;
use \Closure;
use yii\rest\Action;

class SearchAction extends Action
{
    public $data;

    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        $data = $this->data;
        if( $this->data !== null){
            $data = call_user_func($this->data, $this, Yii::$app->getRequest()->getQueryParams());
        }
        return $data;
    }

}