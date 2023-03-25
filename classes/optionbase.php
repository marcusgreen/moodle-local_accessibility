<?php

namespace local_accessibility\options;

defined('MOODLE_INTERNAL') or die();

abstract class optionbase {
    protected $title;
    protected $name;

    protected function __construct($title, $name) {
        $this->title = $title;
        $this->name = $name;
    }

    public function getname() {
        return $this->name;
    }

    public function gettitle() {
        return $this->title;
    }

    public function init() {
        return;
    }

    public abstract function getcontent();
}
