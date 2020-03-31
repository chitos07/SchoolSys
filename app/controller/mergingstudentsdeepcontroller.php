<?php
namespace PHPMVC\controller;


use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\BranchesModel;
use PHPMVC\Models\BusModel;
use PHPMVC\Models\ClientsModel;
use PHPMVC\Models\DayGainModel;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\ExpensesCategoriesModel;
use PHPMVC\Models\MergingStudentsDeepModel;
use PHPMVC\Models\ProductListModel;
use PHPMVC\Models\PurchasesInvoicesModel;
use PHPMVC\Models\PurchasesModel;
use PHPMVC\Models\SalesInvoicesModel;
use PHPMVC\Models\SalesModel;
use PHPMVC\Models\StagesModel;
use PHPMVC\Models\StudentsModel;
use PHPMVC\Models\SuppliersModel;
use PHPMVC\Models\SystemModel;
use PHPMVC\Models\TypesModel;
use PHPMVC\Models\YearsModel;

class MergingStudentsDeepController extends AbstractController
{
    use InputFilter;
    use Helper;

    
  
    public function defaultAction(){

       $this->languages->load('template.common');
       $this->languages->load('mergingstudentsdeep.default');
       $this->_data['deeps'] = MergingStudentsDeepModel::getAll();


         $this->_view();


    }

    public function viewAction()
    {
        $id = $this->filterint($this->_params[0]);
        $merging = MergingStudentsDeepModel::getByPK($id);
        $this->languages->load('template.common');

        $this->languages->load('mergingstudents.labels');
        $this->languages->load('mergingstudents.view');

        $this->_data['mergings'] = $merging;
        $this->_data['student'] = StudentsModel::getByPK($merging->Student_id);

        $this->_view();
    }

    
}
