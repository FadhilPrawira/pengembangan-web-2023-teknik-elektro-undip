<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');
/**
 * An extension of the base CodeIgniter model that provides a number of handy CRUD
 * functions, validation, relationships, observers and more.
 *
 * @link http://github.com/dwightwatson/codeigniter-model
 */
class MY_Model extends CI_Model
{
	/**
	 * The table name.
	 */
	protected $_table;
	/**
	 * Define field properties.
	 */
	protected $_primary_key = 'id';
	protected $_fields = array();
	/**
	 * Define field protection functionality.
	 */
	protected $_protect_fields = TRUE;
	protected $_protected_fields;
	/**
	 * Define soft delete functionality.
	 */
	protected $_soft_delete = FALSE;
	protected $_soft_delete_key = 'deleted';
	protected $_include_deleted = FALSE;
	/**
	 * Define model relationships.
	 */
	protected $_has_one = array();
	protected $_has_many = array();
	protected $_has_and_belongs_to_many = array();

	protected $_belongs_to = array();
	/**
	 * Define model validation rules.
	 */
	protected $_validation_rules = array();
	protected $_skip_validation = FALSE;

	/**
	 * Define model filters.
	 */
	protected $_before_create = array();
	protected $_after_create = array();

	protected $_before_read = array();
	protected $_after_read = array();

	protected $_before_update = array();
	protected $_after_update = array();

	protected $_before_delete = array();
	protected $_after_delete = array();

	protected $_callback_parameters = array();
	/**
	 * By default results are returned as objects, but this can be overridden.
	 */
	protected $_return_type = 'object';
	public function __construct()
	{
		parent::__construct();

		// Ensure database library is loaded.
		if ( ! $this->db)
		{
			$this->load->library('database');
		}

		// Get the model table.
		$this->_determine_table();

		// Get the model fields.
		$this->_determine_fields();

		// If field protection is enabled, add the protect_attributes
		// function to be run as a filter prior to creates and updates.
		if ($this->_protect_fields)
		{
			array_unshift($this->_before_create, 'protect_attributes');
			array_unshift($this->_before_update, 'protect_attributes');
		}
	}
	/**
	 * Catch-all function to capture method requests to achieve
	 * ActiveRecord-style functionality.
	 */
	public function __call($method, $arguments)
	{
		log_message('debug', 'MY_Model captured function call.');

		// Capture methods as get_by_*
		if (stristr($method, 'get_by'))
		{
			return $this->_magic_get_by(str_replace('get_by_', '', $method), $arguments);
		}

		// Capture methods as get_all_by_*
		if (stristr($method, 'get_all_by'))
		{
			return $this->_get_all_by(str_replace('get_all_by_', '', $method), $arguments);
		}

		log_message('debug', 'MY_Model now looking for potential relationships.');

		if (array_key_exists($method, $this->_has_one))
		{

		}

		if (array_key_exists($method, $this->_has_many))
		{

		}

		if (array_key_exists($method, $this->_has_and_belongs_to_many))
		{

		}

		if (array_key_exists($method, $this->_belongs_to))
		{

		}

		log_message('debug', 'MY_Model passing the function call onto the model itself.');

		if (isset($args))
		{
			return $this->$method;
		}

		return $this->$method($args);
	}
	/**
	 * Determines the table of the model by removing the _model suffix,
	 * making the name lowercase and then pluralising it.
	 *
	 * For example, User_model maps to the table users.
	 *
	 * @access	private
	 * @return	void
	 */
	private function _determine_table()
	{
		if ( ! isset($this->_table))
		{
			$this->load->helper('inflector');
			$this->_table = plural(strtolower(str_replace('_model', '', get_class($this))));
		}
	}
	/**
	 * Determines the fields of the table using the database tools. This is
	 * to ensure that the model ignores any fields that do not exist. For
	 * performance reasons, these should be coded manually for each model to
	 * avoid this query.
	 *
	 * @access	public
	 * @return	void
	 */
	private function _determine_fields()
	{
		if ( ! isset($this->_fields))
		{
			$this->_fields = $this->db->list_fields($this->_table);
		}
	}
	/* -------------------------------------
	 * CREATE FUNCTIONS
	 * ---------------------------------- */
	/**
	 * Creates an item in the database table.
	 *
	 * @access	public
	 * @param	array
	 * @return	integer | boolean
	 */
	public function insert($data)
	{
		$valid = TRUE;
		if ($_skip_validation === FALSE)
		{
			$data = $this->validate($data);
		}
		if ($data !== FALSE)
		{
			$this->_trigger('before_create', $data);

			$insert_data = array();

			foreach ($this->_fields as $field)
			{
				if ( ! array_key_exists($field, $this->_protected_fields))
				{
					if (isset($data[$field]))
					{
						$insert_data[$field] = $data[$field];
					}
				}
			}

			$this->db->insert($this->_table, $insert_data);
			$insert_id = $this->db->insert_id();

			$this->_trigger('after_create', $insert_id);

			return $insert_id;
		}
		else
		{
			return FALSE;
		}
	 }

	 /**
	  * Creates multiple itmes in the database table.
	  *
	  * @access	public
	  * @param	array
	  * @return	array
	  */
	 public function insert_many($data)
	 {
		 $ids = array();

		 foreach ($data as $key => $value)
		 {
			 $ids[] = $this->insert($data);
		 }

		 return $ids;
	 }
	/* -------------------------------------
	 * READ FUNCTIONS
	 * ---------------------------------- */
	/**
	 * Get row with given primary key value.
	 *
	 * @access	public
	 * @param	integer
	 * @return	object | null
	 */
	public function get($primary_key)
	{
		$this->_trigger('before_read');
		// Process soft delete functionality.
		if ($this->_soft_delete && $this->_include_deleted === FALSE)
		{
			$this->db->where($this->_soft_delete_key, FALSE);
		}

		$row = $this->db->get_where($this->_table, array($this->_primary_key => $primary_key), 1)->row();

		$row = $this->_trigger('after_read', $row);

		return $row;
	}
	public function get_by($field, $value = NULL)
	{
		$this->_trigger('before_read');

		// Process soft delete functionality.
		if ($this->_soft_delete && $this->_include_deleted === FALSE)
		{
			$this->db->where($this->_soft_delete_key, FALSE);
		}

		if (is_array($field))
		{
			$this->db->where($field);
		}
		else
		{
			$this->db->where($field, $value);
		}

		$row = $this->db->get($this->_table, 1)->row();

		$row = $this->_trigger('after_read', $row);

		return $row;
	}

	/**
	 * This function re-routes magic methods to the actual, public
	 * method.
	 *
	 * @param	string
	 * @param	array
	 * @return	object | null
	 */
	private function _magic_get_by($column, $args)
	{
		// $args[0] is the expected value of the column.

		return $this->get_by($column, $args[0]);
	}
	public function get_all_by($field, $value = NULL)
	{
		$this->_trigger('before_read');

		// Process soft delete functionality.
		if ($this->_soft_delete && $this->_include_deleted === FALSE)
		{
			$this->db->where($this->_soft_delete_key, FALSE);
		}

		if (is_array($field))
		{
			$this->db->where($field);
		}
		else
		{
			$this->db->where($field, $value);
		}

		$result = $this->db->get($this->table)->result();

		foreach ($result as $key => &$row)
		{
			$row = $this->_trigger('after_read', $row, ($key == count($result) - 1));
		}

		return $result;
	}

	/**
	 * This function re-routes magic methods to the actual, public
	 * method.
	 *
	 * @param	string
	 * @param	array
	 * @return	object | null
	 */
	private function _magic_get_all_by($column, $args)
	{
		// $args[0] is the expected value of the column.

		return $this->get_all_by($column, $args[0]);
	}
	public function get_all()
	{
		$this->_trigger('before_read');

    	// Process soft delete functionality.
    	if ($this->_soft_delete && $this->_include_deleted === FALSE)
    	{
	    	$this->db->where($this->_soft_delete_key, FALSE);
    	}

    	$result = $this->db->get($this->_table);

    	foreach ($result as $key => &$row)
    	{
	    	$row = $this->_trigger('after_read', $row, ($key == count($result) - 1));
    	}

    	return $result;
	}
	/* -------------------------------------
	 * UPDATE FUNCTIONS
	 * ---------------------------------- */
	public function update($primary_key, $data)
	{
		$data = $this->_trigger('before_update', $data);

		if ($data !== FALSE)
		{
			$update_data = array();

			foreach ($this->_fields as $field)
			{
				if ( ! array_key_exists($field, $this->_protected_fields))
				{
					if (isset($data[$field]))
					{
						$insert_data[$field] = $data[$field];
					}
				}
			}

			$result = $this->db->where($this->_primary_key, $primary_key)
				->set($update_data)
				->update($this->_table);

			$this->_trigger('after_update', array($update_data, $result));

			return $result;
		}
		else
		{
			return FALSE;
		}
	}

	public function update_many($primary_keys, $data)
	{

	}

	public function update_by()
	{

	}

	public function update_all($data)
	{

	}

	/* -------------------------------------
	 * DELETE FUNCTIONS
	 * ---------------------------------- */

	public function delete($primary_key)
	{

	}

	public function delete_many($primary_keys)
	{

	}

	public function delete_by($field, $value = NULL)
	{

	}
	/* -------------------------------------
	 * UTILITY FUNCTIONS
	 * ---------------------------------- */

	/**
	 * Count all rows, with or without deleted.
	 *
	 * @access	public
	 * @return	integer
	 */
	public function count_all($field, $value)
	{
		if (is_array($field))
		{
			$this->db->where($field);
		}
		else
		{
			$this->db->where($field, $value);
		}
		if ($this->_include_deleted === TRUE)
		{
			return $this->db->where($this->_soft_delete_key, FALSE)
				->count_all_results($this_>_table);
		}
		else
		{
			return $this->db->count_all($this->_table);
		}
	}

	/**
	 * Return the next auto-increment value (MySQL only).
	 *
	 * @access	public
	 * @return	integer
	 */
	public function get_next_id()
	{
		return (int) $this->db->select('AUTO_INCREMENT')
			->from('information_schema.TABLES')
			->where('TABLE_NAME', $this->_table)
			->where('TABLE_SCHEMA', $this->db->database)
			->get()
			->row();
	}
	/**
	 * Get model table.
	 *
	 * @access	public
	 * @return	string
	 */
	public function get_table()
	{
		return $this->_table;
	}

	/* -------------------------------------
	 * SOFT DELETE FUNCTIONS
	 * ---------------------------------- */

	/**
	 * Will tell the model to included deleted resources
	 * if soft delete functionality is enabled.
	 *
	 * @access	public
	 * @return	self
	 */
	public function include_deleted()
	{
		if ($this->_soft_delete)
		{
			$this->_include_deleted = TRUE;
		}

		return $this;
	 }
	/* -------------------------------------
	 * OBSERVERS
	 * ---------------------------------- */

	/**
	 * Adds the current DATETIME to the 'created' property
	 * of a row.
	 *
	 * @param	object | array
	 * @return	object | array
	 */
	public function created($row)
	{
		if (is_object($row))
		{
			$row->created = date('Y-m-d H:i:s');
		}
		else
		{
			$row['created'] = date('Y-m-d H:i:s');
		}

		return $row;
	}

	/**
	 * Adds the current DATETIME to the 'updated' property
	 * of a row.
	 *
	 * @param	object | array
	 * @return	object | array
	 */
	public function updated($row)
	{
		if (is_object($row))
		{
			$row->updated = date('Y-m-d H:i:s');
		}
		else
		{
			$row['updated'] = date('Y-m-d H:i:s');
		}

		return $row;
	}

	/**
	 * Removes protected attributes from a row
	 *
	 * @param	object | array
	 * @return	object | array
	 */
	public function protect_attributes($row)
	{
		foreach ($this->_protected_fields as $attribute)
		{
			if (is_object($row))
			{
				unset($row->attribute);
			}
			else if (is_array($row))
			{
				unset($row[$attribute]);
			}
		}

		return $row;
	}
	/* -------------------------------------
	 * QUERY BUILDER PASS-THROUGH METHODS
	 * ---------------------------------- */

	/**
	 * Pass-through for select().
	 */
	public function select($select = '*', $escape = NULL)
	{
		$this->db->select($select, $escape);

		return $this;
	}

	/**
	 * Pass-through for order_by().
	 */
	public function order_by($criteria, $order = 'ASC')
	{
		if (is_array($criteria))
		{
			foreach ($criteria as $key => $value)
			{
				$this->db->order_by($key, $value);
			}
		}
		else
		{
			$this->db->order_by($criteria, $order);
		}

		return $this;
	}

	/**
	 * Pass-through for limit().
	 */
	public function limit($limit, $offset = 0)
	{
		$this->db->limit($limit, $offset);

		return $this;
	}

	/**
	 * Pass-through for like().
	 */
	public function like($field, $value = NULL)
	{
		if (is_array($field))
		{
			foreach ($field as $key => $value)
			{
				$this->db->like($key, $value);
			}
		}
		else
		{
			$this->db->like($field, $value);
		}

		return $this;
	}

	/* -------------------------------------
	 * INTERNAL FUNCTIONS
	 * ---------------------------------- */

	/**
	 * If validation is turned on, this will run the validation rules
	 * provided against the given data.
	 *
	 * @param	object
	 * @return	boolean
	 */
	private function _validate($data)
	{
		// If we're meant to skip validation, we'll just return the given data.
		if ($this->_skip_validation)
		{
			return $data;
		}
		// Only run the rules if they actually exist.
		if ( ! empty($this->_validation_rules))
		{
			// We need to put the data back into the $_POST global so that
			// the CodeIgniter form validation library can process it.
			foreach ($data as $key => $value)
			{
				$_POST[$key] = $value;
			}
			$this->load->library('form_validation');
			if (is_array($this->_validation_rules))
			{
				$this->form_validation->set_rules($this->_validation_rules);
				if ($this->form_validation->run() === TRUE)
				{
					return $data;
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				if ($this->form_validation->run($this->_validation_rules) === TRUE)
				{
					return $data;
				}
				else
				{
					return FALSE;
				}
			}
		}
		else
		{
			return $data;
		}
	}
	/**
	 * Trigger an event and call its observers. Pass through the event
	 * name (which looks for an instance variable $this->_event_name), an
	 * array of parameters to pass through and an optional 'last in
	 * iteration' boolean.
	 *
	 * @param	string
	 * @param	array
	 * @param	boolean
	 * @return	object
	 */
	private function _trigger($event, $data = FALSE, $last = TRUE)
	{
		if (isset($this->{'_' . $event}) && is_array($this->{'_' . $event}))
		{
			foreach ($this->_{$event} as $method)
			{
				if (strpos($method, '('))
				{
					preg_match('/([a-zA-Z0-9\_\-]+)(\(([a-zA-Z0-9\_\-\., ]+)\))?/', $method, $matches);

					$method = $matches[1];
					$this->_callback_parameters = explode(',', $matches[3]);
				}

				$data = call_user_func_array(array($this, $method), array($data, $last));
			}
		}

		return $data;
	}
}
/* End of file MY_Model.php */
/* Location ./application/core/MY_Model.php */
