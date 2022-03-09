<?php

namespace App\Http\Livewire;
use Livewire\Component;

class User extends Component 
{ 
 
    public $users,$user_id,$name,$email,$email_verified_at,$password;
        
    public $modal=false;

    public $view = 'create';


    public function render()
    {
        \General::is_allow_live_wire('users.index');
        $this->users = \User::all();
        return view('users.index')->layout('layouts.base',['title' => 'Users']);
    }

    /*
    * Clear Fields Of Controller
    * @return  void
    */
    public function clearFields(){
        $this->user_id = "";
        $this->name = "";
        $this->email = "";
        $this->email_verified_at = "";
        $this->password = "";
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
    * Store User
    * @return  void
    */    
    public function store(){
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password
        ];
        
        \User::store($data);

        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Create Successfully");
    }

    /*
    * Populate Fields User
    * @return  void
    */  
    public function populateFields($id){
        $user = \User::find($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->email_verified_at = $user->email_verified_at;
        $this->password = $user->password;
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
    * Update User
    * @return  void
    */ 
    public function update(){
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password
        ];
        \User::update($this->user_id,$data);
        $this->closeModal();
        $this->clearFields();
        session()->flash("message","Record Was Udpate Successfully");
    }

    /*
    * Delete User
    * @return  void
    */ 
    public function destroy($id){
        \User::destroy($id);
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