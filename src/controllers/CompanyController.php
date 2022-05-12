<?php
require 'BaseController.php';

class CompanyController extends BaseController{

    public function view(CompanyModel $model){
        $companies = $model->getAll();

        $this->view->render('CompanyView', ['companies' => $companies]);
    }

    public function create(CompanyModel $model, $request){

        $model->create(['name' => $request['name'],
                        'email' => $request['email']]);
        $model->save();

        $this->refresh();
    }

    public function update(CompanyModel $model, $request){

        $model->update(['name' => $request['name'],
                        'email' => $request['email']]);

        $this->refresh();
    }

    public function edit(CompanyModel $model=null){

        $this->view->render('EditCompanyView', ['id' => $model->id, 'name' => $model->name, 'email' => $model->email]);
    }

    public function delete(CompanyModel $model){
        $model->delete();
        
        $this->refresh();
    }

    private function refresh(){
        header("Location: /company");
        die();
    }
}
