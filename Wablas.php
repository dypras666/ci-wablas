<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 
class Wablas extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct(); 
        $this->token = 'Token disini'; // isi token wablas.com disini
	 	    $this->load->model('md');  // load model disini
        
    }  
	// WABLAS INFO PAKET
	public function wablas_info()
	{ 
		$curl       = curl_init(); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $this->token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/device/info?token=".$this->token);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo  $result;		
	} 
    public function wablas_report($tgl_awal,$tgl_akhir)
    {
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,
        array(
            "Authorization: $this->token",
                )
            );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/report?from=".$tgl_awal."&to=".$tgl_akhir);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        echo "<pre>";
        print_r($result);
    }
    public function wablas_restart()
    {
        $curl       = curl_init(); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $this->token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/device/reconnect?token=".$this->token);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo  $result;  
    }
    public function wablas_change_sender($nomer)
    {
            $curl = curl_init(); 
            $data = [
                'phone' => $nomor,
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $this->token",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/device/change-sender");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);

            echo "<pre>";
            print_r($result);
    }
	
    public function wablas_send($kode=NULL,$no_hp=""){  
$message_text ="Halo, transaksi telah jatuh tempo selama _20_ hari harap segera melunasi atau tagihan anda akan masuk ke kolektor";
$message_text .= "
"; 
$message_text .= "
"; 
$message_text .="Produk yang Anda beli : ";
$message_text .= "

";

$message_text .= "
"; 
$message_text .= "Frame: 10.00";
$message_text .= "
"; 
$message_text .= "Harga: 10.000 ";
$message_text .= "
";  
$message_text .= "
Pembayaran Yang kami terima:
";

$message_text .= "
"; 
$message_text .= "Total Harga: 10.000.000";
$message_text .= "
";
$message_text .= "Jumlah Bayar: 100.000";
$message_text .= ""; 
$message_text .= " 
"; 
$message_text .= "*TAGIHAN ANDA: 10.000*";
$message_text .= "
";
$message_text .= "
";
$message_text .= "_harap segera melunasi tagihan anda_";
$message_text .= "
";
$message_text .= "_TERIMAKASIH_";
$message_text .= "
";
$message_text .= "Jangan sungkan untuk menghubungi kami di";
$message_text .= "
";
$message_text .="
Telpon :07257855237
Website : http://namaweb.com
OPTIK HORE HORE
Jl. Sutan Syahrir 24b Metro

OPTIK HORE HORE CAB 21
Jl. A.H Nasution 21 Metro

OPTIK HORE HORE CAB KOTA GAJAH
Jl. Raya  Seputih Raman Kota Gajah Lam-Teng

OPTIK HORE HORE RAMURA
Komplek Pertokoan Raman Utara Lam-Tim

OPTIK LIVINA RUMBIA
Jl. Raya Rumbia Lam-Teng

OPTIK HORE HORE SEP. BANYAK
Jl. Lintas Timur Simpang Randu Lam-Teng";
        $curl = curl_init();
        $token = $this->token;
        $data = [
            'phone' => $no_hp,
            'message' => $message_text, 
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }

    public function wablas_NewUser($no_hp='',$message='')
    { 
 
        $curl = curl_init();
        $token = $this->token;
        $data = [
            'phone' => $no_hp,
            'message' => $message_text, 
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}
