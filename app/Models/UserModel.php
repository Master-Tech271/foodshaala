<?php namespace App\Models;
use CodeIgniter\Model;
//users table model for manipulation
class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'type', 'password', 'updated_at', 'preference', 'rname'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data) {
        if(isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}