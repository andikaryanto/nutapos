<?php
namespace App\Consts;

class ResponseConst extends BaseConts{

	//Success
	const OK = [
		'Status' => 'OK',
		'Code'   => 1000,
	];

	//Fail
	const INVALID_LOGIN         = [
		'Status' => 'INVALID_LOGIN',
		'Code'   => 2000,
	];
	const NO_ACCESS_USER_MODULE = [
		'Status' => 'NO_ACCESS_USER_MODULE',
		'Code'   => 2001,
	];
	const FAILED_SAVE_DATA      = [
		'Status' => 'FAILED_SAVE_DATA',
		'Code'   => 2002,
	];
	const DATA_NOT_FOUND        = [
		'Status' => 'DATA_NOT_FOUND',
		'Code'   => 2003,
	];
	const FAILED_TO_VERIFY      = [
		'Status' => 'FAILED_TO_VERIFY',
		'Code'   => 2004,
	];
	const FAILED_TRACK_LOCATION = [
		'Status' => 'FAILED_TRACK_LOCATION',
		'Code'   => 2005,
	];
	const NO_DATA_FOUND         = [
		'Status' => 'NO_DATA_FOUND',
		'Code'   => 2006,
	];
	const DATA_EXIST            = [
		'Status' => 'DATA_EXIST',
		'Code'   => 2007,
	];
	const INVALID_DATA          = [
		'Status' => 'INVALID_DATA',
		'Code'   => 2008,
	];
	const FAILED_TO_REGISTER    = [
		'Status' => 'FAILED_TO_REGISTER',
		'Code'   => 2009,
	];
	const SESSION_EXPPIRED      = [
		'Status' => 'SESSION_EXPPIRED',
		'Code'   => 2010,
	];
	const INVALID_CREDENTIAL    = [
		'Status' => 'INVALID_CREDENTIAL',
		'Code'   => 2011,
	];
	const FORBIDDEN             = [
		'Status' => 'FORBIDDEN',
		'Code'   => 2012,
	];
	const FAILED_DELETE_DATA    = [
		'Status' => 'FAILED_DELETE_DATA',
		'Code'   => 2013,
	];
	const TOKEN_NOT_FOUND       = [
		'Status' => 'TOKEN_NOT_FOUND',
		'Code'   => 2014,
	];
	const SESSION_EXPIRED       = [
		'Status' => 'SESSION_EXPIRED',
		'Code'   => 2015,
	];
	const PAGE_NOT_FOUND        = [
		'Status' => 'PAGE_NOT_FOUND',
		'Code'   => 2016,
	];

}
