<?php
Rhaco::import("resources.Message");
Rhaco::import("database.model.TableObjectBase");
Rhaco::import("database.model.DbConnection");
Rhaco::import("database.TableObjectUtil");
Rhaco::import("database.model.Table");
Rhaco::import("database.model.Column");
/**
 * #ignore
 * 
 */
class ParticipantTable extends TableObjectBase{
	/**  */
	var $id;
	/**  */
	var $event;
	/**  */
	var $name;
	/**  */
	var $mail;
	/**  */
	var $comment;
	/**  */
	var $hash;
	/**  */
	var $date;
	var $factEvent;


	function ParticipantTable($id=null){
		$this->__init__($id);
	}
	function __init__($id=null){
		$this->id = null;
		$this->event = null;
		$this->name = null;
		$this->mail = null;
		$this->comment = null;
		$this->hash = null;
		$this->date = time();
		$this->setId($id);
	}
	function connection(){
		if(!Rhaco::isVariable("_R_D_CON_","kaigi")){
			Rhaco::addVariable("_R_D_CON_",new DbConnection("kaigi"),"kaigi");
		}
		return Rhaco::getVariable("_R_D_CON_",null,"kaigi");
	}
	function table(){
		if(!Rhaco::isVariable("_R_D_T_","Participant")){
			Rhaco::addVariable("_R_D_T_",new Table(Rhaco::constant("DATABASE_kaigi_PREFIX")."participant",__CLASS__),"Participant");
		}
		return Rhaco::getVariable("_R_D_T_",null,"Participant");
	}


	/**
	 * 
	 * @return database.model.Column
	 */
	function columnId(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Id")){
			$column = new Column("column=id,variable=id,type=serial,size=22,primary=true,",__CLASS__);
			$column->label(Message::_("id"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Id");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Id");
	}
	/**
	 * 
	 * @return serial
	 */
	function setId($value){
		$this->id = TableObjectUtil::cast($value,"serial");
	}
	/**
	 * 
	 */
	function getId(){
		return $this->id;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnEvent(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Event")){
			$column = new Column("column=event,variable=event,type=integer,size=22,reference=Event::Id,",__CLASS__);
			$column->label(Message::_("event"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Event");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Event");
	}
	/**
	 * 
	 * @return integer
	 */
	function setEvent($value){
		$this->event = TableObjectUtil::cast($value,"integer");
	}
	/**
	 * 
	 */
	function getEvent(){
		return $this->event;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnName(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Name")){
			$column = new Column("column=name,variable=name,type=string,size=50,max=50,min=1,require=true,",__CLASS__);
			$column->label(Message::_("名前"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Name");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Name");
	}
	/**
	 * 
	 * @return string
	 */
	function setName($value){
		$this->name = TableObjectUtil::cast($value,"string");
	}
	/**
	 * 
	 */
	function getName(){
		return $this->name;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnMail(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Mail")){
			$column = new Column("column=mail,variable=mail,type=email,size=255,",__CLASS__);
			$column->label(Message::_("mail"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Mail");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Mail");
	}
	/**
	 * 
	 * @return email
	 */
	function setMail($value){
		$this->mail = TableObjectUtil::cast($value,"email");
	}
	/**
	 * 
	 */
	function getMail(){
		return $this->mail;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnComment(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Comment")){
			$column = new Column("column=comment,variable=comment,type=string,size=255,max=255,",__CLASS__);
			$column->label(Message::_("comment"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Comment");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Comment");
	}
	/**
	 * 
	 * @return string
	 */
	function setComment($value){
		$this->comment = TableObjectUtil::cast($value,"string");
	}
	/**
	 * 
	 */
	function getComment(){
		return $this->comment;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnHash(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Hash")){
			$column = new Column("column=hash,variable=hash,type=string,",__CLASS__);
			$column->label(Message::_("hash"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Hash");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Hash");
	}
	/**
	 * 
	 * @return string
	 */
	function setHash($value){
		$this->hash = TableObjectUtil::cast($value,"string");
	}
	/**
	 * 
	 */
	function getHash(){
		return $this->hash;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnDate(){
		if(!Rhaco::isVariable("_R_D_C_","Participant::Date")){
			$column = new Column("column=date,variable=date,type=timestamp,",__CLASS__);
			$column->label(Message::_("date"));
			Rhaco::addVariable("_R_D_C_",$column,"Participant::Date");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Participant::Date");
	}
	/**
	 * 
	 * @return timestamp
	 */
	function setDate($value){
		$this->date = TableObjectUtil::cast($value,"timestamp");
	}
	/**
	 * 
	 */
	function getDate(){
		return $this->date;
	}
	/**  */
	function formatDate($format="Y/m/d H:i:s"){
		return DateUtil::format($this->date,$format);
	}


	function getFactEvent(){
		return $this->factEvent;
	}
	function setFactEvent($obj){
		$this->factEvent = $obj;
	}
}
?>