<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role1 = Role::create(['name' => 'Administrador']);
   

        Permission::create(['name'=>'Servicios_inicio'])->syncRoles($role1);
       Permission::create(['name'=>'Servicios_agregar'])->syncRoles($role1);
       Permission::create(['name'=>'Servicios_editar'])->syncRoles($role1);
       Permission::create(['name'=>'Servicios_eliminar'])->syncRoles($role1);
       Permission::create(['name'=>'Clientes_inicio'])->syncRoles($role1);
       Permission::create(['name'=>'Clientes_agregar'])->syncRoles($role1);
       Permission::create(['name'=>'Clientes_editar'])->syncRoles($role1);
       Permission::create(['name'=>'Clientes_eliminar'])->syncRoles($role1);
       Permission::create(['name'=>'Ventas_listado'])->syncRoles($role1);
       Permission::create(['name'=>'Ventas_listado_detalles'])->syncRoles($role1);
       Permission::create(['name'=>'Ventas_crear'])->syncRoles($role1);
       Permission::create(['name'=>'Comprobantes_inicio'])->syncRoles($role1);
       Permission::create(['name'=>'Comprobantes_detalles'])->syncRoles($role1);
       Permission::create(['name'=>'Comprobantes_detalles_imprimir'])->syncRoles($role1);

       Permission::create(['name'=>'Arqueos'])->syncRoles($role1);
       Permission::create(['name'=>'Roles_inicio'])->syncRoles($role1);
       Permission::create(['name'=>'Roles_agregar'])->syncRoles($role1);
       Permission::create(['name'=>'Roles_editar'])->syncRoles($role1);
       Permission::create(['name'=>'Roles_eliminar'])->syncRoles($role1);
       Permission::create(['name'=>'Permisos_inicio'])->syncRoles($role1);

       Permission::create(['name'=>'Permisos_agregar'])->syncRoles($role1);
       Permission::create(['name'=>'Permisos_editar'])->syncRoles($role1);
       Permission::create(['name'=>'Permisos_eliminar'])->syncRoles($role1);
       Permission::create(['name'=>'Asignar_inicio'])->syncRoles($role1);
       Permission::create(['name'=>'Asignar_sincronizar'])->syncRoles($role1);
       Permission::create(['name'=>'Asignar_revocar'])->syncRoles($role1);

       Permission::create(['name'=>'Usuarios_inicio'])->syncRoles($role1);
       Permission::create(['name'=>'Usuarios_agregar'])->syncRoles($role1);
       Permission::create(['name'=>'Usuarios_editar'])->syncRoles($role1);
       Permission::create(['name'=>'Usuarios_eliminar'])->syncRoles($role1);
       Permission::create(['name'=>'Asignar'])->syncRoles($role1);
    

  
    }
}
