<?php

namespace Fuel\Migrations;

class Create_tasks
{
	public function up()
	{
		\DBUtil::create_table('tasks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 256, 'type' => 'varchar'),
			'parent' => array('constraint' => 11, 'type' => 'int'),
			'finished' => array('constraint' => 11, 'type' => 'int', 'default' => '0'),
			'deleted' => array('constraint' => 11, 'type' => 'int', 'default' => '0'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tasks');
	}
}