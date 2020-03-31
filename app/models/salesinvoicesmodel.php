<?php

namespace PHPMVC\Models;
class SalesInvoicesModel extends AbstractModel
{
    public $Id;
    public $ProductId;
    public $Quantity;
    public $ProductPrice;
    public $InvoiceId;



    protected static $tablename = 'app_sales_invoices_details';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'ProductId' => self::DATA_TYPE_INT,
        'Quantity' => self::DATA_TYPE_INT,
        'ProductPrice' => self::DATA_TYPE_INT,
        'InvoiceId' => self::DATA_TYPE_INT,




    );

    protected static $primarykey = 'Id';


//    public static function getAll()
//    {
//        $sql = 'SELECT apic.*, apl.Name Name   FROM ' . self::$tablename . ' apic';
//        $sql .= ' INNER JOIN ' . ProductListModel::getModelTableName()  . ' apl ON apl.ProductId = apic.ProductId';
//
//        return self::get($sql);
//    }




}


