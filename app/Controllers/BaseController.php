<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\BusinessProcess\UserProc;
use App\Eloquents\M_groupusers;
use App\Libraries\SessionLib;
use CodeIgniter\Controller;
use Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [
		'date',
		'helper',
		'paging',
		'config',
		'inflector',
		'url',
		'html',
		'appurl',
		'appform',
	];

	public $db;
	public $customRequest  = null;
	public $customResponse = null;
	public $headerData     = [];
	public $validation     = null;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		$this->customRequest  = \Config\Services::request();
		$this->customResponse = \Config\Services::response();
		$this->db             = \Config\Database::connect();
		$this->validation     = \Config\Services::validation();
		parent::initController($request, $response, $logger);
	}

	public function loadAdmin($page, $data = [])
	{
		$token                     = SessionLib::get('userdata');
		$users                     = UserProc::decodeToken($token);
		$this->headerData['users'] = $users;

		$sideMenu = [
			'Dashboard'          => true,
			'Area'               => true,
			'Fund'               => true,
			'Canvasser'          => true,
			'Shop'               => true,
			'ProductCategory'    => true,
			'Product'            => true,
			'ProductMart'        => true,
			'PaymentCategory'    => true,
			'Payment'            => true,
			'HistoryFee'         => true,
			'HistoryTransaction' => true,
			'Whatsapp'           => true,
			'Setting'            => true,
		];

		$groupuser = M_groupusers::find($users->M_Groupuser_Id);
		if (! empty($groupuser))
		{
			if ($groupuser->GroupName === 'Canvasser')
			{
				$sideMenu['Dashboard']          = false;
				$sideMenu['Area']               = false;
				$sideMenu['Fund']               = false;
				$sideMenu['Canvasser']          = false;
				$sideMenu['ProductCategory']    = false;
				$sideMenu['ProductMart']        = false;
				$sideMenu['PaymentCategory']    = false;
				$sideMenu['Payment']            = false;
				$sideMenu['HistoryTransaction'] = false;
				$sideMenu['Whatsapp']           = false;
				$sideMenu['Setting']            = false;
			}
		}

		$this->headerData['sideMenu'] = (object)$sideMenu;

		echo view('admin/shared/header', $this->headerData);
		echo view($page, $data);
		echo view('admin/shared/footer');
	}

	public function loadCustomer($page, $data = [])
	{
		echo view('customer/shared/header');
		echo view($page, $data);
		echo view('customer/shared/footer');
	}
}
