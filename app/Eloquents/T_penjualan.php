<?php

namespace App\Eloquents;

use App\Eloquents\BaseEloquent;
use App\Exceptions\EloquentException;

class T_penjualan extends BaseEloquent
{
	 public $TransactionID;
	 public $Tanggal;
	 public $Jam;
	 public $NamaPelanggan;
	 public $Total;
	 public $BayarTunai;
	 public $Kembali;
	 public $TglJamUpdate;

	protected $table   = 'penjualan';
	static $primaryKey = 'TransactionID';

	public function __construct()
	{
		parent::__construct();
	}

	 /**
	  * To validate your object before you store to database
	  *
	  * @throws App\Exceptions\ModelException
	  *
	  * @return App\Eloquents\T_penjualan
	  */
	public function validate()
	{
		
		// $this->validateRules();

		return $this;
	}

	public static function validationRules()
	{
		$rules = [
			'Name' => [
				'label'  => 'Nama',
				'rules'  => 'required|max_length[100]',
				'errors' => [
					'required'   => '{field} tidak boleh kosong',
					'max_length' => 'maksimal panjang {field} adalah 100',
				],
			],
		];

		return $rules;
	}
}
