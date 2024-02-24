<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class CarBrandsModel extends Model
{
    protected $table      = 'car_brands';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['title', 'code'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getCarBrands()
    {
        $db = Database::connect();
        $builder = $db->table('car_brands');
        $builder->select('car_brands.*');
        $builder->where('car_brands.deleted_at', null);
        $query = $builder->get();
        
        return $query->getResult();
    }
}