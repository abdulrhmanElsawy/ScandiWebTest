<?php



/*************************************************************************
 *   Get All Function v2.0                                               *                          
 *  Function To Get All Records From Any Database Table                 *                                  
**************************************************************************/


function getAllFrom($field, $table, $where = NULL, $and = NULL, $orderfield, $ordering = 'DESC'){

    global $con;

    $getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");

    $getAll->execute();

    $all = $getAll->fetchAll();

    return $all;
}