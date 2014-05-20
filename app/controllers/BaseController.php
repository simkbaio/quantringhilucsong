<?php

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
    public function checkPermission($permission){
        if(!checkPermission($permission)){
            throw new \Acme\Exceptions\PermissionException("Bạn không có quyền truy cập: ".URL::current());
        }
    }

}
