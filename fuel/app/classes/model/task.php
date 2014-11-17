<?php
use Orm\Model;

class Model_Task extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'parent',
		'finished',
		'deleted',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[128]');
		$val->add_field('description', 'Description', 'max_length[1000]');
		$val->add_field('parent', 'Parent', 'valid_string[numeric]');
		$val->add_field('finished', 'Finished', 'valid_string[numeric]');
		$val->add_field('deleted', 'Deleted', 'valid_string[numeric]');

		return $val;
	}

}
