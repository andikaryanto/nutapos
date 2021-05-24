<?php

namespace App\Eloquents;

use AndikAryanto11\Eloquent;
use App\BusinessProcess\UserProc;
use App\Exceptions\EloquentException;
use App\Libraries\CommonLib;
use App\Libraries\DateLib;
use App\Libraries\SessionLib;
use CodeIgniter\Config\Services;
use Firebase\JWT\JWT;

class BaseEloquent extends Eloquent
{

	protected $dbs;
	protected $request;
	protected $validation;
	// protected $hideFieldValue = [
	// 	"CreatedBy",
	// 	"Modified",
	// 	"ModifiedBy"
	// ];
	public function __construct()
	{
		$this->dbs        = \Config\Database::connect();
		$this->request    = \Config\Services::request();
		$this->validation = \Config\Services::validation();
		helper('inflector');
		parent::__construct($this->dbs);
	}
	/**
	 * Validate model use codeignite  validation rule
	 * If Model is not valid will throw eception
	 *
	 * @param boolean $listError if true will return array list error otherwise throw exception
	 *
	 * @return array list error
	 * @throws EloquentException
	 */
	public function validateRules($listError = false)
	{
		$this->validation->reset();
		$this->validation->setRules(static::validationRules());
		if (! $this->validation->run((array)$this))
		{
			if (! $listError)
			{
				foreach ($this->validation->getErrors() as $key => $error)
				{
					throw new EloquentException($error, $this);
				}
			}

			return $this->validation->getErrors();
		}

		return [];
	}

	private static function validationRules()
	{
		return [];
	}

	public function parseFromRequest($isJson = false)
	{
		$request = $this->request;
		$fields  = $this->dbs->getFieldData($this->table);
		if ($isJson)
		{
			$post = $request->getJSON();
		}
		else
		{
			$post = (object)$request->getPost();
		}
		if ($fields)
		{
			foreach ($fields as $field)
			{
				$prop   = $field->name;
				$type   = $field->type;
				$length = $field->max_length;

				if (key_exists($prop, $post))
				{
					if (! empty($post->$prop))
					{
						if (preg_match('/^int/', $type))
						{
							$this->$prop = setisnumber($post->$prop);
						}
						else if (preg_match('/^varchar/', $type))
						{
							$this->$prop = setisnull($post->$prop);
						}
						else if (preg_match('/^decimal/', $type))
						{
							$this->$prop = setisdecimal($post->$prop);
						}
						else if (preg_match('/^datetime/', $type))
						{
							$this->$prop = get_formated_date($post->$prop);
						}
						else if (preg_match('/^date/', $type))
						{
							$this->$prop = get_formated_date($post->$prop, 'Y-m-d');
						}
						else if (preg_match('/^double/', $type))
						{
							$this->$prop = $post->$prop;
						}
						else if (preg_match('/^smallint/', $type))
						{
							if ($length === 1)
							{
								$this->$prop = 1;
							}
							else
							{
								$this->$prop = setisnumber($post->$prop);
							}
						}
						else if (preg_match('/^text/', $type))
						{
							$this->$prop = $post->$prop;
						}
					}
					else
					{
						$this->$prop = null;
					}
				}
				else if (preg_match('/^smallint/', $type))
				{
					if ($length === 1)
					{
						$this->$prop = null;
					}
				}
			}
		}

		return $this;
	}

	public function beforeSave()
	{
		$useraccount = null;
		$token       = $this->request->getGet('Authorization');
		if (! empty($token))
		{
			$jwt = JWT::decode($token, getSecretKey(), ['HS256']);
			if ($jwt)
			{
				$useraccount = (object)$jwt->User;
				if (empty($this->{static::$primaryKey}))
				{
					$this->CreatedBy = $useraccount->Username;
					$this->Created   = get_db_date();
				}
				else
				{
					$this->UpdatedBy = $useraccount->Username;
					$this->Updated   = get_db_date();
				}
			}
		}
		else
		{
			// $user = SessionLib::get('userdata');
			$session = SessionLib::get('userdata');
			if (! empty($session))
			{
				$user = UserProc::decodeToken(SessionLib::get('userdata'));

				if (in_array('Created', $this->fields) && empty($this->{static::$primaryKey}))
				{
					$this->Created = DateLib::getCurrentDate('Y-m-d H:i:s');
				}

				if (in_array('CreatedBy', $this->fields) && empty($this->{static::$primaryKey}))
				{
					if (! empty($user))
					{
						$this->CreatedBy = $user->Username;
					}
				}

				if (in_array('Modified', $this->fields) && ! empty($this->{static::$primaryKey}))
				{
					$this->Modified = DateLib::getCurrentDate('Y-m-d H:i:s');
				}

				if (in_array('ModifiedBy', $this->fields) && ! empty($this->{static::$primaryKey}))
				{
					if (! empty($user))
					{
						$this->ModifiedBy = $user->Username;
					}
				}
			}
		}
	}

	private function getClass($class)
	{
		$arr = explode('_', $class);
		return $arr[0] . '_' . lcfirst(plural($arr[1]));
	}

	private function getForeignKey($key)
	{
		$arr = explode('_', $key);
		return $arr[0] . '_' . ucfirst(singular($arr[1]));
	}

	public function __call($name, $argument)
	{
		if (substr($name, 0, 4) === 'get_' && substr($name, 4, 5) !== 'list_' && substr($name, 4, 6) !== 'first_')
		{
			$sufixColumn  = isset($argument[0]) ? "_{$argument[0]}" : null;
			$entity       = 'App\\Eloquents\\' . $this->getClass(substr($name, 4));
			$field        = $this->getForeignKey(substr($name, 4)) . '_Id' . $sufixColumn;
			$entityobject = $entity;
			if (! empty($this->$field))
			{
				$result = $entityobject::findOrNew($this->$field);
				return $result;
			}
			else
			{
				return new $entityobject;
			}
		}
		else if (substr($name, 0, 4) === 'get_' && substr($name, 4, 5) === 'list_')
		{
			$params = isset($argument[0]) ? $argument[0] : null;

			$entity = 'App\\Eloquents\\' . $this->getClass(substr($name, 9));
			$field  = str_replace('Entity', '', $this->getForeignKey(explode('\\', static::class)[2])) . '_Id';
			$id     = ! empty($this->{static::$primaryKey}) ? $this->{static::$primaryKey} : null;
			if (! empty($id))
			{
				$entityobject = $entity;

				if (isset($params['where']))
				{
					$params['where'][$field] = $id;
				}
				else
				{
					$params['where'] = [
						$field => $id,
					];
				}

				$result = $entityobject::findAll($params);
				return $result;
			}
			return [];
		}
		else if (substr($name, 0, 4) === 'get_' && substr($name, 4, 6) === 'first_')
		{
			$params = isset($argument[0]) ? $argument[0] : null;
			$entity = 'App\\Eloquents\\' . $this->getClass(substr($name, 10));
			$field  = str_replace('Entity', '', $this->getForeignKey(explode('\\', static::class)[2])) . '_Id';

			$entityobject = $entity;
			$id           = ! empty($this->{static::$primaryKey}) ? $this->{static::$primaryKey} : null;
			if (! empty($id))
			{
				if (isset($params['where']))
				{
					$params['where'][$field] = $id;
				}
				else
				{
					$params['where'] = [
						$field => $id,
					];
				}
				$result = $entityobject::findOneOrNew($params);
				return $result;
			}

			return new $entityobject;
		}
		else
		{
			trigger_error('Call to undefined method ' . __CLASS__ . '::' . $name . '()', E_USER_ERROR);
		}
	}

	public static function empty()
	{
		$instance = new static;
		if ($instance->builder->emptyTable())
		{
			return true;
		}
		return false;
	}

	public static function emptyOrFail()
	{
		$instance = new static;
		if ($instance->builder->emptyTable())
		{
			return true;
		}
		throw new EloquentException('Gagal Menghapus Semua Data');
	}

	public static function remove($filter = [])
	{
		$instance = new static;
		$instance->setFilters($filter);
		if ($instance->builder->delete())
		{
			return true;
		}
		return false;
	}

	public static function removeOrError($filter = [])
	{
		$instance = new static;
		$instance->setFilters($filter);
		if ($instance->builder->delete())
		{
			return true;
		}

		throw new EloquentException('Gagal Menghapus Data');
	}
}
