<?php
require dirname(__FILE__). '/__init__.php';
Rhaco::import('tag.HtmlParser');

$db = new DbUtil(Event::connection());

$p = new HtmlParser('index.html');
$p->setVariable('event', $db->get(new Event(), new C(Q::depend(), Q::eq(Event::columnId(), Rhaco::constant('CURRENT_EVENT', 1)))));
$p->setVariable('hatena', Rhaco::obj('HatenaSyntax', array('headlevel' => 4, 'id' => 'event_description')));
$p->write();
