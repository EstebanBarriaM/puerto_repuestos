<?php
namespace App\Models;
use CodeIgniter\Model;


class InventoryModel extends Model
{
    protected $table      = 'inventory';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['quantity'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}