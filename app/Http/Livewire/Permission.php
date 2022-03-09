<?php

namespace App\Http\Livewire;
use Livewire\Component;

class Permission extends Component 
{ 
 
    public $permissions,$permission_id,$name,$route,$description;
        
    public $modal=false;

    public $view = 'create';


    public function render()
    {
        \General::is_allow_live_wire('permissions.index');
        $this->permissions = \Permission::all();
        return view('permissions.index')->layout('layouts.base',['title' => 'Permissions']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->permission_id = "";
        $this->name = "";
        $this->route = "";
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
    * Store Permission
    * @return  void
    */    
    public function store(){
        $data = [
            'name' => $this->name,
            'route' => $this->route,
            'description' => $this->description
        ];
        
        \Permission::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields Permission
    * @return  void
    */  
    public function populateFields($id){
        $permission = \Permission::find($id);
        $this->permission_id = $permission->id;
        $this->name = $permission->name;
        $this->route = $permission->route;
        $this->description = $permission->description;
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
    * Update Permission
    * @return  void
    */ 
    public function update(){
        $data = [
            'name' => $this->name,
            'route' => $this->route,
            'description' => $this->description
        ];
        \Permission::update($this->permission_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete Permission
    * @return  void
    */ 
    public function destroy($id){
        \Permission::destroy($id);
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