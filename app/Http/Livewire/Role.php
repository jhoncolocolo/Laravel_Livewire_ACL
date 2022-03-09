<?php

namespace App\Http\Livewire;
use Livewire\Component;

class Role extends Component 
{ 
 
    public $roles,$role_id,$name,$role,$description;
        
    public $modal=false;

    public $view = 'create';


    public function render()
    {
        \General::is_allow_live_wire('roles.index');
        $this->roles = \Role::all();
        return view('roles.index')->layout('layouts.base',['title' => 'Roles']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->role_id = "";
        $this->name = "";
        $this->role = "";
        $this->description = "";
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
    * Store Role
    * @return  void
    */    
    public function store(){
        $data = [
            'name' => $this->name,
            'role' => $this->role,
            'description' => $this->description
        ];
        
        \Role::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields Role
    * @return  void
    */  
    public function populateFields($id){
        $role = \Role::find($id);
        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->role = $role->role;
        $this->description = $role->description;
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
    * Update Role
    * @return  void
    */ 
    public function update(){
        $data = [
            'name' => $this->name,
            'role' => $this->role,
            'description' => $this->description
        ];
        \Role::update($this->role_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete Role
    * @return  void
    */ 
    public function destroy($id){
        \Role::destroy($id);
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