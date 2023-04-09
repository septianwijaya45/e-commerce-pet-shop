<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $dataGroup = [
            [
                'id'            => 1,
                'name'          => 'admin',
                'description'   => 'Adminstrator Pet Shop'
            ],
            [
                'id'            => 2,
                'name'          => 'Member Pet Shop',
                'description'   => 'Member Pet Shop'
            ]
        ];
        $dataPermission = [
            [
                'id'            => 1,
                'name'          => 'Dashboard',
                'description'   => 'Dashboard Page'
            ],
            [
                'id'            => 2,
                'name'          => 'Produk',
                'description'   => 'Produk Page'
            ],
            [
                'id'            => 3,
                'name'          => 'Profile',
                'description'   => 'Profile Page'
            ],
            [
                'id'            => 4,
                'name'          => 'Kategori',
                'description'   => 'Kategori Page'
            ],
            [
                'id'            => 5,
                'name'          => 'Order',
                'description'   => 'Order Page'
            ],
            [
                'id'            => 6,
                'name'          => 'Pembayaran',
                'description'   => 'Pembayaran Page'
            ],
        ];
        $dataUser = [
            [
                'id'        => 1,
                'email'     => 'admin@gmail.com',
                'username'  => 'admin',
                'password'  => bin2hex('admin'),
                'active'    => 1
            ],
            [
                'id'        => 2,
                'email'     => 'member1@gmail.com',
                'username'  => 'member1',
                'password'  => bin2hex('member'),
                'active'    => 1
            ],
            [
                'id'        => 3,
                'email'     => 'member2@gmail.com',
                'username'  => 'member2',
                'password'  => bin2hex('member'),
                'active'    => 1
            ],
        ];
        $dataGroupUser = [
            [
                'group_id'  => 1,
                'user_id'   => 1
            ],
            [
                'group_id'  => 2,
                'user_id'   => 2
            ],
            [
                'group_id'  => 2,
                'user_id'   => 3
            ],
        ];
        $dataPermissionUser = [
            [
                'group_id'      => 1,
                'permission'    => 1
            ],
            [
                'group_id'      => 1,
                'permission'    => 2
            ],
            [
                'group_id'      => 1,
                'permission'    => 3
            ],
            [
                'group_id'      => 1,
                'permission'    => 4
            ],
            [
                'group_id'      => 1,
                'permission'    => 5
            ],
            [
                'group_id'      => 1,
                'permission'    => 6
            ],
            [
                'group_id'      => 2,
                'permission'    => 1
            ],
            [
                'group_id'      => 2,
                'permission'    => 2
            ],
            [
                'group_id'      => 2,
                'permission'    => 3
            ],
            [
                'group_id'      => 2,
                'permission'    => 4
            ],
            [
                'group_id'      => 2,
                'permission'    => 5
            ],
            [
                'group_id'      => 2,
                'permission'    => 6
            ],
        ];

        $this->db->table('auth_groups')->insertBatch($dataGroup);
        $this->db->table('auth_permissions')->insertBatch($dataPermission);
        $this->db->table('users')->insertBatch($dataUser);
        $this->db->table('auth_group_users')->insertBatch($dataGroupUser);
        $this->db->table('auth_permission_users')->insertBatch($dataPermissionUser);
    }
}
