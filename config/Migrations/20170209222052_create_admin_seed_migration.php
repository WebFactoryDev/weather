<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateAdminSeedMigration extends AbstractMigration
{
   public function up()
   {

        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Users',1,[
            
            'nombre'=> 'Roberto',
            'apellidos'=>'Martínez Sánchez',
            'email'=>'roberto.martinez@webfactory.mx',
           
            'password' => 'password',
            'role'=>'admin',
            'active'=>1,
            'created'=> '2017-02-09 16:40:18',
            'modified'=> '2017-02-09 16:40:18'

        ]);

        $populator->execute();
   }
}
