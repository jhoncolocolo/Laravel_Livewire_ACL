<?php

namespace App\Http\Livewire;
use Livewire\Component;

class Language extends Component 
{ 
 
    public $languages,$language_id,$name_en,$name_es,$meaning_name_en,$meaning_name_es;
        
    public $modal=false;

    public $view = 'create';


    public function render()
    {
        \General::is_allow_live_wire('languages.index');
        $this->languages = \Language::all();
        return view('languages.index')->layout('layouts.base',['title' => 'Languages']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->language_id = "";
        $this->name_en = "";
        $this->name_es = "";
        $this->meaning_name_en = "";
        $this->meaning_name_es = "";
        $this->view = 'create';
    }


    /*
    * Create Form Registry
    * @return  void
    */
    public function create(){
        $this->clearFields();
        $this->openModal();
    }
    
    /*
    * Store Language
    * @return  void
    */    
    public function store(){
        $data = [
            'name_en' => $this->name_en,
            'name_es' => $this->name_es,
            'meaning_name_en' => $this->meaning_name_en,
            'meaning_name_es' => $this->meaning_name_es
        ];
        
        \Language::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields Language
    * @return  void
    */  
    public function populateFields($id){
        $language = \Language::find($id);
        $this->language_id = $language->id;
        $this->name_en = $language->name_en;
        $this->name_es = $language->name_es;
        $this->meaning_name_en = $language->meaning_name_en;
        $this->meaning_name_es = $language->meaning_name_es;
    }

    /*
    * Edit Form Registry
    * @return  void
    */
    public function edit($id){
        $this->populateFields($id);
        $this->view = 'edit';
        $this->openModal();
    }

    /*
    * Update Language
    * @return  void
    */ 
    public function update(){
        $data = [
            'name_en' => $this->name_en,
            'name_es' => $this->name_es,
            'meaning_name_en' => $this->meaning_name_en,
            'meaning_name_es' => $this->meaning_name_es
        ];
        \Language::update($this->language_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete Language
    * @return  void
    */ 
    public function destroy($id){
        \Language::destroy($id);
        session()->flash("message","Record Was Delete Successfully");
    }

    /*
    * Open Modal
    * @return  void
    */
    public function openModal(){
        $this->modal = true;
    }

    /*
    * Close Modal
    * @return  void
    */
    public function closeModal(){
        $this->modal = false;
    }
}