<?php 
class errors extends Controller {

    public function __construct() {

    }

    public function index() {
        $this->view('pages/errors');
    }

}