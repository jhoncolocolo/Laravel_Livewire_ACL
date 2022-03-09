<?php

namespace App\Http\Livewire;
use Livewire\Component;

class PermissionUser extends Component 
{ 
 
    public $permissionUsers,$permission_user_id,$permissionSelected,$userSelected;
    public $search,$permissions,$users;    
    public $modal=false;

    public $view = 'create';

    public function mount()
    {
        $this->permissions = \App\Models\Permission::selectRaw("permissions.name AS Permission")->selectRaw("id")->get()->toArray();
        $this->users = \App\Models\User::selectRaw("users.name AS User")->selectRaw("id")->get()->toArray();
    }

    public function render()
    {
        \General::is_allow_live_wire('permission_users.index');
        $this->permissionUsers = \PermissionUser::allDetails($this->search);
        return view('permission_users.index')->layout('layouts.base',['title' => 'Permission users']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->permission_user_id = "";
        $this->permissionSelected = "";
        $this->userSelected = "";
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
    * Store PermissionUser
    * @return  void
    */    
    public function store(){
        $data = [
            'permission_id' => $this->permissionSelected,
            'user_id' => $this->userSelected
        ];
        
        \PermissionUser::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields PermissionUser
    * @return  void
    */  
    public function populateFields($id){
        $permissionUser = \PermissionUser::find($id);
        $this->permission_user_id = $permissionUser->id;
        $this->permissionSelected = $permissionUser->permission_id;
        $this->userSelected = $permissionUser->user_id;
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
    * Update PermissionUser
    * @return  void
    */ 
    public function update(){
        $data = [
            'permission_id' => $this->permissionSelected,
            'user_id' => $this->userSelected
        ];
        \PermissionUser::update($this->permission_user_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete PermissionUser
    * @return  void
    */ 
    public function destroy($id){
        \PermissionUser::destroy($id);
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