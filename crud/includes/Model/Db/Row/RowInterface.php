<?php
namespace Model\Db\Row;

interface RowInterface
{
    public function save();
    public function delete();
    public function assignData();
    
}
