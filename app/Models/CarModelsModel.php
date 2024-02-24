<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class CarModelsModel extends Model
{
    protected $table      = 'car_models';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['car_brand_id','title', 'code'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getCarModels()
    {
        $db = Database::connect();
        $builder = $db->table('car_models');
        $builder->select('car_models.*, car_brands.title as car_brand_title');
        $builder->join('car_brands', 'car_brands.id = car_models.car_brand_id');
        $builder->where('car_models.deleted_at', null);
        $query = $builder->get();
        
        return $query->getResult();
    }
}