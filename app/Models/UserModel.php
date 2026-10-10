<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'username',
        'full_name',
        'email',
        'password',
        'created_at'
    ];

    // Retrieve the single demo user
    public function getDemoUser()
    {
        return $this->orderBy('id', 'ASC')
                    ->first();
    }
}
