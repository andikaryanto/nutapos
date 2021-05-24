<?php

namespace App\Controllers\Rest;

use App\Consts\ResponseConst;
use App\Eloquents\M_paymentcategories;
use App\Eloquents\M_payments;
use App\Eloquents\M_productcategories;
use App\Eloquents\T_penjualan;
use App\Eloquents\T_penjualandetil;
use App\Exceptions\EloquentException;
use App\Libraries\DbtransLib;
use CodeIgniter\HTTP\Response;

class Sales extends BaserestController
{

	public function __construct()
	{
	}

     // Question number 2
     public function taxMarkUp(){
          $body = $this->customRequest->getJson();
          $total = $body->total;
          $persen_pajak = $body->persen_pajak;

          $totalBeforetax = $total / ((100 + $persen_pajak) / 100);
          $tax = $total - $totalBeforetax;

          $result = [
               "Message" =>"Berhasil",
               "Data" => [
                    "net_sales" => $totalBeforetax,
                    "pajak_rp" => $tax
               ],
               "Response" => ResponseConst::OK
          ];
          return $this->customResponse->setStatusCode(200)->setJSON($result);
     }

     // Question Number 4
     public function discount(){
          $body = $this->customRequest->getJson();
          $discounts = $body->discounts;
          $total_sebelum_diskon = $body->total_sebelum_diskon;
          
          $currentPrice = $total_sebelum_diskon;
          $totalDiscount = 0;

          foreach($discounts as $discount){
               $totalDiscount += $currentPrice * $discount->diskon / 100;
               $currentPrice -= $totalDiscount;
          }

          $result = [
               "Message" =>"Berhasil",
               "Data" => [
                    "total_diskon" => $totalDiscount,
                    "total_harga_setelah_diskon" => $total_sebelum_diskon - $totalDiscount
               ],
               "Response" => ResponseConst::OK
          ];
          return $this->customResponse->setStatusCode(200)->setJSON($result);
     }

     // Question Number 5
     public function profitShare(){
          $body = $this->customRequest->getJson();
          $harga_sebelum_markup = $body->harga_sebelum_markup;
          $markup_persen = $body->markup_persen;
          $share_persen = $body->share_persen;
          
          $netPrice = $harga_sebelum_markup + ($harga_sebelum_markup * $markup_persen / 100);
          $ojolShare = $netPrice * $share_persen / 100;

          $result = [
               "Message" =>"Berhasil",
               "Data" => [
                    "net_untuk_resto" => $netPrice,
                    "share_untuk_ojol" => $ojolShare
               ],
               "Response" => ResponseConst::OK
          ];
          return $this->customResponse->setStatusCode(200)->setJSON($result);
     }

}