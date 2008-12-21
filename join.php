<?php
require dirname(__FILE__). '/__init__.php';
Rhaco::import('generic.Flow');

$flow = new Flow();
$db = new DbUtil(Event::connection());
if($flow->isPost() && $flow->isVariable('answer') && strtolower($flow->getVariable('answer')) == strtolower(Rhaco::constant('ANSWER'))){
    $p = $flow->toObject(new Participant());
    if($db->insert($p)){
        $flow->setVariable('participant', $p);
        $flow->write('thanks.html');
        Rhaco::end();
    }
} else ExceptionTrigger::raise(new GenericException('登録に失敗しました'));
$flow->setVariable('event', $db->get(new Event(), new C(Q::depend(), Q::eq(Event::columnId(), Rhaco::constant('CURRENT_EVENT', 1)))));
$flow->setVariable('hatena', Rhaco::obj('HatenaSyntax', array('headlevel' => 4, 'id' => 'event_description')));
$flow->write('index.html');
