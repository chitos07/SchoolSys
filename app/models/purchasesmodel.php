<?php

namespace PHPMVC\Models;
class PurchasesModel extends AbstractModel
{
    public $InvoiceId;
    public $SupplierId;
    public $PaymentType;
    public $PaymentStatus;
    public $Created;
    public $Discount;
    public $UserId;



    protected static $tablename = 'app_purchases_invoices';
    protected static $tableschema = array(
        'InvoiceId' => self::DATA_TYPE_INT,
        'SupplierId' => self::DATA_TYPE_INT,
        'PaymentType' => self::DATA_TYPE_STR,
        'PaymentStatus' => self::DATA_TYPE_STR,
        'Created' => self::DATA_TYPE_STR,
        'Discount' => self::DATA_TYPE_DECIMAL,
        'UserId' => self::DATA_TYPE_INT,




    );

    protected static $primarykey = 'InvoiceId';

    public static function getAll()
    {

        $sql = 'SELECT api.*, apid.*, apl.Name Product ,aps.Name Name,apu.Username Username  FROM ' . self::$tablename . ' api';
        $sql .= ' INNER JOIN ' . PurchasesInvoicesModel::getModelTableName()  . ' apid ON apid.InvoiceId = api.InvoiceId';
        $sql .= ' INNER JOIN ' . ProductListModel::getModelTableName()  . ' apl ON apl.ProductId = apid.ProductId';
        $sql .= ' INNER JOIN ' . SuppliersModel::getModelTableName()  . ' aps ON aps.SupplierId = api.SupplierId';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' apu ON apu.UserId = api.UserId';


        return self::get($sql);
    }



}



