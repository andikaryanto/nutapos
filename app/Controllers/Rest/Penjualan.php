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

class Penjualan extends BaserestController
{

	public function __construct()
	{
	}

     // Question Number 1
     public function save(){
          try{
               DbtransLib::beginTransaction();
               $body = $this->customRequest->getJson();

               $penjualan = new T_penjualan();
               $penjualan->NamaPelanggan = $body->NamaPelanggan;
               $penjualan->Tanggal = $body->Tanggal;
               $penjualan->Jam = $body->Jam;
               $penjualan->Total = $body->Total;
               $penjualan->BayarTunai = $body->BayarTunai;
               $penjualan->Kembali = $body->Kembali;
               if(! $penjualan->save())
                    throw new EloquentException("Gagal Menyimpan Penjualan");

               foreach($body->DetilPenjualan as $detil){
                    $detilPenjualan = new T_penjualandetil();
                    $detilPenjualan->TransactionID = $penjualan->TransactionID;
                    $detilPenjualan->NamaItem = $detil->Item;
                    $detilPenjualan->Quantity = $detil->Qty;
                    $detilPenjualan->HargaSatuan = $detil->HargaSatuan;
                    $detilPenjualan->SubTotal = $detil->SubTotal;
                    if(! $detilPenjualan->save())
                         throw new EloquentException("Gagal Menyimpan Penjualan");
               }
               
               DbtransLib::commit();

               $result = [
                    "Message" =>"Berhasil",
                    "Data" => $penjualan,
                    "Response" => ResponseConst::OK
               ];
               return $this->customResponse->setStatusCode(200)->setJSON($result);

          } catch (EloquentException $e){

               DbtransLib::rollback();
               $result = [
                    "Message" => $e->getMessage(),
                    "Data" => null,
                    "Response" => ResponseConst::FAILED_SAVE_DATA
               ];
               return $this->customResponse->setStatusCode(400)->setJSON($result);
          }
     }

     public function list(){
          try{
               $getJson = (object)$this->customRequest->getGet();
               $params = [
                    "limit" => [
                         "page" => 1,
                         "size" => 5
                    ]
               ];

               if(isset($getJson->page) && $getJson->page > 0){
                    $params["limit"]["page"] = $getJson->page;
               }

               if(isset($getJson->size) && $getJson->size > 0){
                    $params["limit"]["size"] = $getJson->size;
               }

               $penjualan = T_penjualan::findAll($params);
               $result = [
                    "Message" => "Success",
                    "Data" => $penjualan,
                    "Response" => ResponseConst::OK
               ];
               return $this->customResponse->setStatusCode(200)->setJSON($result);

          } catch (EloquentException $e){
               $result = [
                    "Message" => $e->getMessage(),
                    "Data" => null,
                    "Response" => ResponseConst::NO_DATA_FOUND
               ];
               return $this->customResponse->setStatusCode(400)->setJSON($result);
          }
     }
}
