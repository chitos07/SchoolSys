<?php

namespace PHPMVC\Models;
class ProductListModel extends AbstractModel
{
    public $ProductId;
    public $CategoryId;
    public $Name;
    public $Image;
    public $BuyPrice;
    public $SellPrice;
    public $BarCode;
    public $Quantity;
    public $Unit;




    protected static $tablename = 'app_products_list';
    protected static $tableschema = array(
        'ProductId' => self::DATA_TYPE_INT,
        'CategoryId' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,
        'Image' => self::DATA_TYPE_STR,
        'BuyPrice' => self::DATA_TYPE_DECIMAL,
        'SellPrice' => self::DATA_TYPE_DECIMAL,
        'BarCode' => self::DATA_TYPE_STR,
        'Quantity' => self::DATA_TYPE_INT,
        'Unit' => self::DATA_TYPE_INT,




    );

    protected static $primarykey = 'ProductId';


    public static function getAll()
    {
        $sql = 'SELECT apl.*, apcm.Name categoryName FROM ' . self::$tablename . ' apl';
        $sql .= ' INNER JOIN ' . ProductCategoriesModel::getModelTableName()  . ' apcm ON apcm.CategoryId = apl.CategoryId';

       return self::get($sql);
    }




}


