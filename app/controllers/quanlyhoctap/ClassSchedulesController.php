<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/2/2014
 * Time: 4:22 PM
 */

class ClassSchedulesController extends \BaseController {
    public $classScheduleForm;

    function __construct(\Acme\Forms\ClassScheduleForm $classScheduleForm)
    {
        $this->classScheduleForm = $classScheduleForm;
    }
    public function create($class_id){
        $class = NClass::findOrFail($class_id);
        return View::make('quanlyhoctap.class_schedules.create')->withClass($class);
    }

} 