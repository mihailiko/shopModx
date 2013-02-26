<?php

require_once dirname(dirname(__FILE__)).'/resource/update.class.php';

class ShopmodxResourceClientUpdateProcessor extends ShopmodxResourceUpdateProcessor{
    public $classKey = 'ShopmodxResourceClient';
    public $objectType = 'shopmodxresourceclient';
    
    public function beforeSet(){
        if(!$this->getProperty('longtitle')){
            $this->addFieldError('longtitle',$message = 'Укажите расширенный заголовок');
        }
        
        if($this->hasErrors()){
            return "Пожалуйста, исправьте ошибки в форме.";
        } 
        
        //  set related object data
        $ro_data = array(
            'sm_name' => $this->getProperty('pagetitle'),
            'sm_fullname' => $this->getProperty('longtitle'),
        );
        
        $this->setProperties($ro_data);
        return parent::beforeSet();
    }
    
    public function beforeSave() {
        $cansave = $this->getRelatedObject();
        if($cansave != true){
            return $cansave;
        }
        
        return parent::beforeSave();
    }
}
return 'ShopmodxResourceClientUpdateProcessor';