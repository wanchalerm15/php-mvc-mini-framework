<?php

class nationsController extends Controller {

    public function Index() {
        $this->view('index', array('model' => new Nations()));
    }

}
