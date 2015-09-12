<?php

class Model {

    public static function __set_state() {
        return new static($this);
    }

}
