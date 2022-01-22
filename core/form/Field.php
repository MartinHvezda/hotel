<?php

    namespace app\core\form;

    trait Field
    {
        public function createSelectInput($values) {
            $options = array();
            foreach ($values as $value) {
                $options[] = "<option value='$value'>$value</option>";
            }

            $return = "<div class='input-group mb-3'>
                <label class='input-group-text' for='inputGroupSelect01'>Options</label>
                <select class='form-select' id='inputGroupSelect01'>
                    <option selected>Choose...</option>" .
                    implode($options) .
                "</select>
            </div>";
            echo $return;
        }

        public function createOptions($options) {
            $return = array();
            foreach ($options as $option) {
                $return[] = "<option value='$option'>$option</option>";
            }
            return $return;
        }

    }