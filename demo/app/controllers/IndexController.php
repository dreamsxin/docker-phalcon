<?php

class IndexController extends \Phalcon\Mvc\Controller
{

    public function onConstruct()
    {
		Phalcon\Tag::setTitle('Home');
		Phalcon\Tag::setTitleSeparator('-');
    }

    public function indexAction()
    {
		Phalcon\Tag::prependTitle('Home');
    }

    public function aboutAction()
    {
		Phalcon\Tag::appendTitle('About');
    }

}

