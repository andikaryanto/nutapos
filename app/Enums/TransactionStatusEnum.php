<?php

namespace App\Enums;

class TransactionStatusEnum extends BaseEnums {

	 const SELESAI             = 1;
	 const MENUNGGU_DITERIMA   = 2;
	 const DITOLAK             = 3;
	 const DIKIRIM             = 4;
	 const MENUNGGU_PEMBAYARAN = 5;
	 const SUDAH_DIBAYAR       = 6;
	 const DIBATALKAN          = 7;
	 const DITERIMA            = 8;
}
