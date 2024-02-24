<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class CategoriesModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'image'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getCategories()
    {
        $db = Database::connect();
        $builder = $db->table('categories');
        $builder->select('categories.*');
        $builder->where('categories.deleted_at', null);
        $query = $builder->get();
        
        return $query->getResult();
    }

    public function getCategoryById($id)
    {
        $db = Database::connect();
        $builder = $db->table('categories');
        $builder->select('categories.*');
        $builder->where('categories.id', $id);
        $query = $builder->get();
        
        return $query->getResult();
    }
}