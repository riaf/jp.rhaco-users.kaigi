<?php
Rhaco::import("model.table.EventTable");
/**
 * 
 */
class Event extends EventTable{
    function isActive($db){
        if($this->private)
            return ExceptionTrigger::raise(new GenericException('このイベントに参加することは出来ません'));
        if($this->periodDate < time())
            return ExceptionTrigger::raise(new GenericException('参加登録期限が過ぎています'));
        if($db->count(new Participant(), new C(Q::eq(Participant::columnEvent(), $this->id))) >= $this->maxParticipant)
            return ExceptionTrigger::raise(new GenericException('参加登録可能人数を超えています'));
        return true;
    }
}

?>