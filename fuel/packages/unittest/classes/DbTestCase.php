<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/11/18
 * Time: 9:43
 */

namespace Unittest;

use Fuel\Core\DB;
use Fuel\Core\DBUtil;
use Fuel\Core\Format;
use Fuel\Core\Log;
use Fuel\Core\TestCase;

class DbTestCase extends TestCase {

    protected $fixt_name;

	// fixture data
	// array of table name and yaml file name
	protected $tables = array(
		// table_name => yaml_file_name
	);

	protected function setUp()
	{
		parent::setUp();

		if ( ! empty($this->tables))
		{
			$this->dbfixt($this->tables);
		}
	}

	protected function dbfixt($tables)
	{
		// support $this->dbfixt('table1', 'table2', ...) format
		$tables = is_string($tables) ? func_get_args() : $tables;

		foreach ($tables as $table => $yaml)
		{
			// read yaml file
			$file_name = $yaml . '_fixt.yml';
			$file = APPPATH . 'tests/fixture/' . $file_name;
			if ( ! file_exists($file))
			{
				exit('No such file: ' . $file . PHP_EOL);
			}
			$data = file_get_contents($file);

			$table = is_int($table) ? $yaml : $table;
			$fixt_name = $table . '_fixt';
			$this->fixt_name = Format::forge($data, 'yaml')->to_array();

			// truncate table
			if (DBUtil::table_exists($table))
			{
				DBUtil::truncate_table($table);
			}
			else
			{
				exit('No such table: ' . $table . PHP_EOL);
			}

			// insert data
			foreach ($this->fixt_name as $row)
			{
				list($insert_id, $rows_affected) = DB::insert($table)->set($row)->execute();
			}

			$ret = Log::info('Table Fixture ' . $file_name . ' -> ' . $fixt_name . ' loaded', __METHOD__);
		}
	}

    public function test_dummy()
    {

    }

} 