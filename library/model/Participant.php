<?php
Rhaco::import("model.table.ParticipantTable");
Rhaco::import('network.mail.Mail');
/**
 * 
 */
class Participant extends ParticipantTable{
    function beforeInsert($db){
        $event = $db->get(new Event($this->event));
        if(Variable::istype('Event', $event) && $event->isActive($db)){
            $this->hash = crypt($this->name. time(). mt_rand(0, 9999));
            
            if($this->mail){
                $parser = new HtmlParser('thanks.mtpl');
                $parser->setVariable('participant', $this);
                $mail = new Mail('noreply@rhaco-users.jp', 'rhaco kaigi');
                $mail->to($this->mail, $this->name);
                $mail->subject('rhaco kaigi');
                $mail->message($parser->read());
                $mail->send();
            }
            
            return true;
        }
        return false;
    }
    function beforeDelete($db){
        $event = $db->get(new Event($this->event));
        if(!Variable::istype('Event', $event) || !$event->isActive($db)){
            return false;
        }
        return true;
    }
}

?>