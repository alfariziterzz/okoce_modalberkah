<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array('name' => 'Masters.User.View','description' => 'Akses untuk melihat menu user');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.User.Create','description' => 'Akses untuk membuat User');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.User.Edit','description' => 'Akses untuk mengedit user');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.User.Delete','description' => 'Akses untuk menghapus user');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Menu.Master.View','description' => 'Akses View main Menu Masterdata');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Menu.AllUser.View','description' => 'Akses View main Menu User');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Dashboard.View','description' => 'Akses View dashboard');	DB::table("permissions")->insert($data);
        $data = array('name' => 'LogAccess.View','description' => 'Akses View Log akses');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Roles.View','description' => 'akses untuk melihat data roles');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Roles.Create','description' => 'akses untuk membuat roles');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Roles.Edit','description' => 'akses untuk mengedit roles');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Roles.Delete','description' => 'akses untuk menghapus roles');	DB::table("permissions")->insert($data);
        // setting
        $data = array('name' => 'General.Setting.View','description' => 'Merubah setting aplikasi');	DB::table("permissions")->insert($data);
        // mesjid
        $data = array('name' => 'Masters.Mesjid.View','description' => 'akses untuk melihat data mesjid');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Mesjid.Create','description' => 'akses untuk menambah');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Mesjid.Edit','description' => 'akses untuk merubah');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Mesjid.Delete','description' => 'akses untuk menghapus');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Mesjid.Profile','description' => 'akses untuk melihat profile mesjid sendiri');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Masters.Mesjid.Viewall','description' => 'akses untuk melihat profile mesjid yang lain');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Pinjaman.View','description' => 'akses untuk melihat profile mesjid yang lain');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Pinjaman.Create','description' => 'akses untuk melihat profile mesjid yang lain');	DB::table("permissions")->insert($data);
        $data = array('name' => 'Pinjaman.Delete','description' => 'akses untuk melihat profile mesjid yang lain');	DB::table("permissions")->insert($data);
    }
}
