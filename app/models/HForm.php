<?php

class HForm
{
    public static function input($data = array(),$errors =array())
    {
        $title = "Unknow Title";
        $name = "Unknow";
        $input = "form-control";
        $label = "";
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
        if (isset($data['input'])) {
            $input = $data['input'];
        }
        if (isset($data['label'])) {
            $label = $data['label'];
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
        Form::label($name, $title, ['class' => $label
            ])
        ;
        switch ($type) {
            case 'text':
            $str .= Form::text($name, $value, ['class' => $input
                ])
            ;
            break;
            case 'password':
            $str .= Form::password($name, ['class' => $input
                ])
            ;
            break;
            case 'textarea':
            $str .= Form::textarea($name, $value, ['class' => $input, 'rows' => $rows
                ])
            ;
            break;
            case 'select':
            $str .= Form::select($name, $data_input, $value, ['class' => $input
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