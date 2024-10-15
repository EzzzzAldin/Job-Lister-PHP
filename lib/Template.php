<?php

class Template
{

    // Path Of template
    protected $template;
    // vars Passed In
    protected $vars = array();

    // Get & Run Template
    public function __construct($template)
    {
        $this->template = $template;
    }
    // Get Protected Properties
    public function __get($key)
    {
        return $this->vars[$key];
    }
    // Set Protected Properties
    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }
    // Use Properties as String on Application
    public function __toString()
    {
        // To Convert Array Into Variables
        extract($this->vars);

        // Get New Directory => chdir Change Directory To Currant Directory
        chdir(dirname($this->template));
        // Any Html Code Stored On memory instead of Send This Code To Browser
        ob_start();

        // To return Name Of File Only instead of Full Directory & use include until PHP Find The File
        include basename($this->template);

        // return Html Code As Value Of Function And Delete in Memory
        return ob_get_clean();
    }

}
