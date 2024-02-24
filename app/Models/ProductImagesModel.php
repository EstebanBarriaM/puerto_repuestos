<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class ProductImagesModel extends Model
{
    protected $table      = 'product_images';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'product_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}