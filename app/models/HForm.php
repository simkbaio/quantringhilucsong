<?php

class HForm
{
    public static function input($data = array(),$errors =array())
    {
        $title = "Unknow Title";
        $name = "Unknow";
        $class_input = "form-control";
        $class_label = "";
        $width = "12";
        $type = 'text';
        $data_input = array();
        $rows = "3";
        $value = Input::old($name);
        if (!$data) {
            return "";
        }
        if (isset($data['value'])) {
            $value = $data['value'];
        }
        if (isset($data['title'])) {
            $title = $data['title'];
        }
        if (isset($data['name'])) {
            $name = $data['name'];
        }
        if (isset($data['class_input'])) {
            $class_input = $data['class_input'];
        }
        if (isset($data['class_label'])) {
            $class_label = $data['class_label'];
        }
        if (isset($data['width'])) {
            $width = $data['width'];
        }
        if (isset($data['type'])) {
            $type = $data['type'];
        }
        if (isset($data['rows'])) {
            $rows = $data['rows'];
        }
        if (isset($data['data_input'])) {
            $data_input = $data['data_input'];
        }

        $str = '<div class="form-group col-md-' . $width . '">' .
        Form::label($name, $title, ['class' => $class_label
            ])
        ;
        switch ($type) {
            case 'text':
            $str .= Form::text($name, $value, ['class' => $class_input
                ])
            ;
            break;
            case 'password':
            $str .= Form::password($name, ['class' => $class_input
                ])
            ;
            break;
            case 'textarea':
            $str .= Form::textarea($name, $value, ['class' => $class_input, 'rows' => $rows
                ])
            ;
            case 'select':
            $str .= Form::select($name, $data_input, $value, ['class' => $class_input
                ])
            ;
            default:
            break;
        }
        if($errors){
            $str .= error_for($name,$errors);
        }
        $str .= '</div>';
        return $str;
    }
}