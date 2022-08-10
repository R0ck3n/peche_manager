<?php

namespace App\Models;

use Library\Core\AbstractModel;

class UserModel extends AbstractModel
{
    /** Récupere infos de tous les utilisateurs et leurs rôles ( page admin )
     * @return array
     */
    public function findAll(): array
    {
        return $this->db->getResults(
            'SELECT id, lastname, firstname, pseudo, email, created_at, role
            FROM users
            INNER JOIN users_roles ON users.id = users_roles.user_id
            INNER JOIN role ON role.roles_id = users_roles.role_id'
        );
    }

    /** Récupere les infos et le rôle d'un utilisateur a partir de son id ( modif en admin )
     * @param int $userId
     * @return array|null
     */
    public function findById(int $userId): ?array
    {
        $user = $this->db->getResults(
            'SELECT id, lastname, firstname, pseudo, email, password, created_at, role
            FROM users
            INNER JOIN users_roles ON users.id = users_roles.user_id
            INNER JOIN role ON role.roles_id = users_roles.role_id
            WHERE id = :id', [
                'id' => $userId
            ]
        );

        if (empty($user)) {
            return null;
        }

        return $user[0];
    }

    /** Récupere les infos et le rôle d'un utilisateur a partir de son email ( pour le login )
     * @param string $userEmail
     * @return array|null
     */
    public function findByEmail(string $userEmail): ?array
    {
        $user = $this->db->getResults(
            'SELECT id, lastname, firstname, email, password, created_at, role
            FROM users
            INNER JOIN users_roles ON users.id = users_roles.user_id
            INNER JOIN role ON role.roles_id = users_roles.role_id
            WHERE email = :email', [
                'email' => $userEmail
            ]
        );

        if (empty($user)) {
            return null;
        }

        return $user[0];
    }

    /** Enregistre un utilisateur en base de donnée
     * @param array $data
     * @return int|null
     */
    public function create(array $data): ?int
    {
        $userId = $this->db->execute('INSERT INTO users (lastname, firstname, pseudo, email, password) VALUES (:lastname, :firstname, :pseudo, :email, :password)', [
            'lastname' => $data['user-lastname'],
            'firstname' => $data['user-firstname'],
            'pseudo' => $data['user-pseudo'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        if ($userId === false) {
            return null;
        }

        return $userId;
    }

    /** Attribut le role de membre a un nouvel utilisateur lors de son enregistrement
     * @return false|string
     */
    public function roleAttrib():false|string
    {
        return $this->db->execute('INSERT INTO users_roles (role_id) VALUES (:role_id)', [
            'role_id' => 2
        ]);

    }

    /** Met a jour les infos d'un utilisateur en fonction de son id
     * @param array $data
     * @return int|null
     */
    public function updateById(array $data): ?int
    {
        return $this->db->execute('UPDATE users SET lastname = :lastname, firstname = :firstname, pseudo = :pseudo, email = :email WHERE id = :id', [
            'lastname' => $data['user-lastname'],
            'firstname' => $data['user-firstname'],
            'pseudo' => $data['user-pseudo'],
            'email' => $data['email'],
            'id'=>$data['id']
        ]);
    }

    /** Met a jour le role d'un utilisateur en fonction de son id
     * @param array $data
     * @return int|null
     */
    public function updateRole(array $data): ?int
    {
        return $this->db->execute('UPDATE users_roles SET role_id = :role  WHERE user_id = :id', [
            'role' => $data['role'],
            'id'=>$data['id']
        ]);
    }

    /** Supprime un utilisateur de la base de donnée
     * @param array $data
     * @return int|null
     */
    public function delete (array $data): ?int
    {
        return $this->db->execute('DELETE FROM users WHERE id = :id', [
            'id'=>$data['id']
        ]);
    }








}