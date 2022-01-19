<?php

    namespace app\core\form;

    trait Field
    {
        public function createSelectInput($values, $id) {
            $options = array();
            foreach ($values as $value) {
                $options[] = "<option value='$value'>$value</option>";
            }

            $return = "<div class='input-group mb-3'>
                <label class='input-group-text' for='$id'>Options</label>
                <select class='form-select' id='$id'>
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