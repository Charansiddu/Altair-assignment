<?php
require 'BaseController.php';
include_once 'models/PeopleModel.php';
include_once 'models/CompanyModel.php';

class PeopleController extends BaseController{

    public function view(PeopleModel $model, $request){
        $people = $model->getAll();
        $companiesModel = new CompanyModel();
        $companies = $companiesModel->getAll();

        $this->view->render('PeopleView', ['people' => $people, 'companies' => $companies]);
    }

    public function create(PeopleModel $model, $request){
        $company = explode('|', $request['company']);

        $model->create(['name' => $request['name'],
                        'phone' => $request['phone'],
                        'company' => $company[1],
                        'company_id' => $company[0]]);
        $model->save();

        $this->refresh();
    }

    public function update(PeopleModel $model, $request){
        $company = explode('|', $request['company']);

        $model->update(['name' => $request['name'],
                        'phone' => $request['phone'],
                        'company' => $company[1],
                        'company_id' => $company[0]]);

        $this->refresh();
    }

    public function editView(PeopleModel $model=null, $request){

        $companiesModel = new CompanyModel();
        $companies = $companiesModel->getAll();

        $this->view->render('EditPeopleView', ['id' => $model->id, 'name' => $model->name, 'phone' => $model->phone, 'companies' => $companies]);
    }

    public function delete(PeopleModel $model, $request){
        $model->delete();

        $this->refresh();
    }

    private function refresh(){
        header("Location: /people");
        die();
    }
}
