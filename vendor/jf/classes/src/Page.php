<?php

namespace JF;

use Rain\Tpl;

class Page{

    private $tpl;
    private $defaults = ["header"=>true, "footer"=>true, "data"=>[]];
    private $options = [];

    public function __construct($opts = array(), $tpl_dir = "views/")
    {
        $this->options = array_merge($this->defaults, $opts);
        $config = array(
            "tpl_dir"=> $tpl_dir,
            "cache_dir"=> "views-cache/"
        );

        Tpl::configure($config);
        $this->tpl = new Tpl();
        $this->setData($this->options["data"]);
        if ($this->options['header'] === true) $this->tpl->draw("header");
    }

    private function setData($data = array())
    {
        foreach ($data as $key => $value){
            $this->tpl->assign($key,$value);
        }
    }

    public function setTpl($name, $data = array(), $html = false)
    {
        $this->setData($data);
        return $this->tpl->draw($name,$html);
    }

    public function __destruct()
    {
        if ($this->options['footer'] === true) $this->tpl->draw("footer");
    }
}