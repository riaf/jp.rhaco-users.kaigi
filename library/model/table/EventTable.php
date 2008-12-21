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
class EventTable extends TableObjectBase{
	/**  */
	var $id;
	/**  */
	var $name;
	/**  */
	var $description;
	/**  */
	var $date;
	/**  */
	var $periodDate;
	/**  */
	var $maxParticipant;
	/**  */
	var $private;
	/**  */
	var $updated;
	var $dependParticipants;


	function EventTable($id=null){
		$this->__init__($id);
	}
	function __init__($id=null){
		$this->id = null;
		$this->name = null;
		$this->description = null;
		$this->date = null;
		$this->periodDate = null;
		$this->maxParticipant = 20;
		$this->private = 1;
		$this->updated = time();
		$this->setId($id);
	}
	function connection(){
		if(!Rhaco::isVariable("_R_D_CON_","kaigi")){
			Rhaco::addVariable("_R_D_CON_",new DbConnection("kaigi"),"kaigi");
		}
		return Rhaco::getVariable("_R_D_CON_",null,"kaigi");
	}
	function table(){
		if(!Rhaco::isVariable("_R_D_T_","Event")){
			Rhaco::addVariable("_R_D_T_",new Table(Rhaco::constant("DATABASE_kaigi_PREFIX")."event",__CLASS__),"Event");
		}
		return Rhaco::getVariable("_R_D_T_",null,"Event");
	}


	/**
	 * 
	 * @return database.model.Column
	 */
	function columnId(){
		if(!Rhaco::isVariable("_R_D_C_","Event::Id")){
			$column = new Column("column=id,variable=id,type=serial,size=22,primary=true,",__CLASS__);
			$column->label(Message::_("id"));
			$column->depend("Participant::Event");
			Rhaco::addVariable("_R_D_C_",$column,"Event::Id");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::Id");
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
	function columnName(){
		if(!Rhaco::isVariable("_R_D_C_","Event::Name")){
			$column = new Column("column=name,variable=name,type=string,",__CLASS__);
			$column->label(Message::_("name"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::Name");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::Name");
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
	function columnDescription(){
		if(!Rhaco::isVariable("_R_D_C_","Event::Description")){
			$column = new Column("column=description,variable=description,type=text,",__CLASS__);
			$column->label(Message::_("description"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::Description");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::Description");
	}
	/**
	 * 
	 * @return text
	 */
	function setDescription($value){
		$this->description = TableObjectUtil::cast($value,"text");
	}
	/**
	 * 
	 */
	function getDescription(){
		return $this->description;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnDate(){
		if(!Rhaco::isVariable("_R_D_C_","Event::Date")){
			$column = new Column("column=date,variable=date,type=timestamp,",__CLASS__);
			$column->label(Message::_("date"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::Date");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::Date");
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
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnPeriodDate(){
		if(!Rhaco::isVariable("_R_D_C_","Event::PeriodDate")){
			$column = new Column("column=period_date,variable=periodDate,type=timestamp,",__CLASS__);
			$column->label(Message::_("period_date"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::PeriodDate");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::PeriodDate");
	}
	/**
	 * 
	 * @return timestamp
	 */
	function setPeriodDate($value){
		$this->periodDate = TableObjectUtil::cast($value,"timestamp");
	}
	/**
	 * 
	 */
	function getPeriodDate(){
		return $this->periodDate;
	}
	/**  */
	function formatPeriodDate($format="Y/m/d H:i:s"){
		return DateUtil::format($this->periodDate,$format);
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnMaxParticipant(){
		if(!Rhaco::isVariable("_R_D_C_","Event::MaxParticipant")){
			$column = new Column("column=max_participant,variable=maxParticipant,type=integer,size=22,",__CLASS__);
			$column->label(Message::_("max_participant"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::MaxParticipant");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::MaxParticipant");
	}
	/**
	 * 
	 * @return integer
	 */
	function setMaxParticipant($value){
		$this->maxParticipant = TableObjectUtil::cast($value,"integer");
	}
	/**
	 * 
	 */
	function getMaxParticipant(){
		return $this->maxParticipant;
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnPrivate(){
		if(!Rhaco::isVariable("_R_D_C_","Event::Private")){
			$column = new Column("column=private,variable=private,type=boolean,",__CLASS__);
			$column->label(Message::_("private"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::Private");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::Private");
	}
	/**
	 * 
	 * @return boolean
	 */
	function setPrivate($value){
		$this->private = TableObjectUtil::cast($value,"boolean");
	}
	/**
	 * 
	 */
	function getPrivate(){
		return $this->private;
	}
	/**  */
	function isPrivate(){
		return Variable::bool($this->private);
	}
	/**
	 * 
	 * @return database.model.Column
	 */
	function columnUpdated(){
		if(!Rhaco::isVariable("_R_D_C_","Event::Updated")){
			$column = new Column("column=updated,variable=updated,type=timestamp,",__CLASS__);
			$column->label(Message::_("updated"));
			Rhaco::addVariable("_R_D_C_",$column,"Event::Updated");
		}
		return Rhaco::getVariable("_R_D_C_",null,"Event::Updated");
	}
	/**
	 * 
	 * @return timestamp
	 */
	function setUpdated($value){
		$this->updated = TableObjectUtil::cast($value,"timestamp");
	}
	/**
	 * 
	 */
	function getUpdated(){
		return $this->updated;
	}
	/**  */
	function formatUpdated($format="Y/m/d H:i:s"){
		return DateUtil::format($this->updated,$format);
	}


	function setDependParticipants($value){
		$this->dependParticipants = $value;
	}
	function getDependParticipants(){
		return $this->dependParticipants;
	}
}
?>