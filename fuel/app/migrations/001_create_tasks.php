<?php

namespace Fuel\Migrations;

class Create_tasks
{
	public function up()
	{
		\DBUtil::create_table('tasks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 128, 'type' => 'varchar', 'notnull' => true),
			'description' => array('type' => 'text', 'null' => true),
			'parent' => array('constraint' => 11, 'type' => 'int', 'default' => '0', 'null' => true),
			'finished' => array('constraint' => 11, 'type' => 'int', 'default' => '0', 'null' => true),
			'deleted' => array('constraint' => 11, 'type' => 'int', 'default' => '0', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tasks');
	}
}