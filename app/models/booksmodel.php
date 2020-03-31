<?php

namespace PHPMVC\Models;
class BooksModel extends AbstractModel
{
    public $Id;
    public $school_student_id;
    public $booksPrice;


    protected static $tablename = 'Books';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'school_student_id' => self::DATA_TYPE_INT,
        'booksPrice' => self::DATA_TYPE_INT,


    );

    protected static $primarykey = 'Id';


    public static function getAll()
    {
        $sql = 'SELECT books.*,  asu.studnetName  StudnetName FROM ' . self::$tablename . ' books';
        $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName() . ' asu ON asu.Id = books.school_student_id';

        return self::get($sql);
    }



}

