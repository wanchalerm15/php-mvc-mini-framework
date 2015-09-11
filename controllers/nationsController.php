<?php

class nationsController extends Controller {

    public function Index() {
        $model = new Nations();
        $nations = $model->FindAll();
        exit(json_encode($nations));
    }

}
