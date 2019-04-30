<?php

/**
 * Class GeschlechtRepository - Gives access to DB Results
 */
class GeschlechtRepository extends BaseCRUDRepository
{
    protected $tableName = "Geschlecht";
    protected $idColumnName = "geschlechtID";
}