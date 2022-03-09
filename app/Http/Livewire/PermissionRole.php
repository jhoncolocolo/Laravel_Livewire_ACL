<?php

namespace App\Http\Livewire;
use Livewire\Component;

class PermissionRole extends Component 
{ 
 
    public $permissionRoles,$permission_role_id,$roleSelected,$permissionSelected;
    public $search,$roles,$permissions;    
    public $modal=false;

    public $view = 'create';

    public function mount()
    {
        $this->roles = \App\Models\Role::selectRaw("roles.name AS Role")->selectRaw("id")->get()->toArray();
        $this->permissions = \App\Models\Permission::selectRaw("permissions.name AS Permission")->selectRaw("id")->get()->toArray();
    }

    public function render()
    {
        \General::is_allow_live_wire('permission_roles.index');
        $this->permissionRoles = \PermissionRole::allDetails($this->search);
        return view('permission_roles.index')->layout('layouts.base',['title' => 'Permission roles']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->permission_role_id = "";
        $this->roleSelected = "";
        $this->permissionSelected = "";
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
    * Store PermissionRole
    * @return  void
    */    
    public function store(){

        $data = [
            'role_id' => $this->roleSelected,
            'permission_id' => $this->permissionSelected
        ];    
        \PermissionRole::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields PermissionRole
    * @return  void
    */  
    public function populateFields($id){
        $permissionRole = \PermissionRole::find($id);
        $this->permission_role_id = $permissionRole->id;
        $this->roleSelected = $permissionRole->role_id;
        $this->permissionSelected = $permissionRole->permission_id;
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
    * Update PermissionRole
    * @return  void
    */ 
    public function update(){
        $data = [
            'role_id' => $this->roleSelected,
            'permission_id' => $this->permissionSelected
        ];
        \PermissionRole::update($this->permission_role_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete PermissionRole
    * @return  void
    */ 
    public function destroy($id){
        \PermissionRole::destroy($id);
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