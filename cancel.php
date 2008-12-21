<?php
require dirname(__FILE__). '/__init__.php';
Rhaco::import('generic.Flow');
Rhaco::import('network.http.Header');

$flow = new Flow();
if(!$flow->isVariable('id')){
    Header::redirect(Rhaco::url());
}

$db = new DbUtil(Event::connection());

if($flow->isPost() && $flow->isVariable('pass')){
    $participant = $db->get(new Participant($flow->getVariable('id')));
    if(Variable::istype('Participant', $participant) && $participant->hash === $flow->getVariable('pass')){
        $db->delete($participant);
        Header::redirect(Rhaco::url());
    }
}
$flow->setVariable('hatena', Rhaco::obj('HatenaSyntax', array('headlevel' => 4, 'id' => 'event_description')));
$flow->write('cancel.html');

