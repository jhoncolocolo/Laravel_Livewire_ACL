<?php

namespace App\Http\Livewire;
use Livewire\Component;

class RoleUser extends Component 
{ 
 
    public $roleUsers,$role_user_id,$roleSelected,$userSelected;
    public $search,$roles,$users;    
    public $modal=false;

    public $view = 'create';

    public function mount()
    {
        $this->roles = \App\Models\Role::selectRaw("roles.name AS Role")->selectRaw("id")->get()->toArray();
        $this->users = \App\Models\User::selectRaw("users.name AS User")->selectRaw("id")->get()->toArray();
    }

    public function render()
    {
        \General::is_allow_live_wire('role_users.index');
        $this->roleUsers = \RoleUser::allDetails($this->search);
        return view('role_users.index')->layout('layouts.base',['title' => 'Role users']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->role_user_id = "";
        $this->roleSelected = "";
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
    * Store RoleUser
    * @return  void
    */    
    public function store(){
        $data = [
            'role_id' => $this->roleSelected,
            'user_id' => $this->userSelected
        ];
        
        \RoleUser::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields RoleUser
    * @return  void
    */  
    public function populateFields($id){
        $roleUser = \RoleUser::find($id);
        $this->role_user_id = $roleUser->id;
        $this->roleSelected = $roleUser->role_id;
        $this->userSelected = $roleUser->user_id;
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
    * Update RoleUser
    * @return  void
    */ 
    public function update(){
        $data = [
            'role_id' => $this->roleSelected,
            'user_id' => $this->userSelected
        ];
        \RoleUser::update($this->role_user_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete RoleUser
    * @return  void
    */ 
    public function destroy($id){
        \RoleUser::destroy($id);
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