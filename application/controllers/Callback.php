<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

	public function index(){	
		$txncd = $_GET["txncd"];
		if(isset($txncd)){
			if ($txncd =="free"){
	        	$statusSave = "SUCCESS";
		        $orderId   	= $_GET["oid"];
	          	$msisdn 	= $_GET['phone'];
				$mc = $_GET['ttl'];
		        $this->updateDb($orderId, $statusSave, $msisdn, $mc);

          		return;
          
	        }
	     	else{
				//check status
				/*process callback url*/
		        $val        = "tickets4u"; //vid
		        $val1       = $_GET["id"];
		        $val2       = $_GET["ivm"];
		        $val3       = $_GET["qwh"];
		        $val4       = $_GET["afd"];
		        $val5       = $_GET["poi"];
		        $val6       = $_GET["uyt"];
		        $val7       = $_GET["ifd"];
		        $orderId   	= $_GET["id"];
		        $msisdn 	= $_GET['msisdn_idnum'];
		        $mc 		= $_GET['mc'];

		        $ipnurl = "https://www.ipayafrica.com/ipn/?vendor=".$val."&id=".$val1."&ivm=".
		        $val2."&qwh=".$val3."&afd=".$val4."&poi=".$val5."&uyt=".$val6."&ifd=".$val7;
		        $fp = fopen($ipnurl, "rb");
		        //$status = stream_get_contents($fp, -1, -1);
		        $status = $_GET['status']; 
		        fclose($fp);

		        //log transaction

		        if($status == "aei7p7yrx4ae34"){ // success transaction
		        	$statusSave = "SUCCESS";
		        	$this->updateDb($orderId, $statusSave, $msisdn, $mc);
		        }

		        if($status == "eq3i7p5yt7645e"){//overpaid 
				  	$statusSave = "OVERPAID";
				  	$this->updateDb($orderId, $statusSave, $msisdn, $mc);
				}

				if($status == "fe2707etr5s4wq"){// Failed transaction	  
				 	echo "failed transaction";
				}

				if($status == "dtfi4p7yty45wq"){ //Less amount
					echo "less amount";
				}

				if($status == "cr5i3pgy9867e1"){//transaction code already used 
				   echo "already exist";
				}
				if($status == "bdi6p2yy76etrs"){ //pending
				 	echo "pending";
				}
				return;
			}
		}
		echo "invalid request";
		return null;
	}

	private function updateDb($orderId, $statusSave, $msisdn, $T_amount)
	{
		/*start session with the url data*/
    	$sessionData = array('oid' => $orderId);
    	$this->session->set_userdata($sessionData);

    	$data = array('transaction_status' => $statusSave, );
    	$update_status = $this->Asset_model->update_order($orderId, $data);

    	if (empty($update_status)) {
    		echo "error occured";
    		return;
    	}

    	//get event details
    	$get_event = $this->Asset_model->get_order($orderId);
      
      	//update available tickets 
    	$tickets = [];
    	foreach ($get_event as $key => $value) {
    		array_push($tickets, $value['ticket_type']);
    	}

    	$this->Asset_model->updateAvailableTickets($get_event[0]['id'], $orderId, $tickets);

    	//update client funds
    	$this->ipayCommision($T_amount, $get_event[0]['id']);
    	//send email
    	$this->sendEmail($orderId);
    	//send sms
    	$this->sendSms($orderId, $msisdn);
    	
    	//load view
    	redirect('index.php/cbkloaded', 'refresh');
	}

	private function ipayCommision($T_amount, $event_id)
	{
		//get set commision plus available balance
		$clent_data = $this->Asset_model->get_Commision($event_id);
		$commision 			= $clent_data[0]['ipay_commission'];
		$available_balance 	= $clent_data[0]['available_balance'];
		$account_id 		= $clent_data[0]['acc_id'];

		$commision_ipay = (($T_amount * $commision)/100);
		$client_funds = ($T_amount - $commision_ipay);
		$total_client_funds = ($available_balance + $client_funds);

		$data = array('available_balance' => $total_client_funds);
		//update funds
		$update_status = $this->Asset_model->update_Funds($account_id, $data);
	}

	public function loadview()
	{
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/callback');
		$this->load->view('global/footer');
	}

	public function sendEmail($orderId)
	{
		$oid = $orderId;
		$get_event['event_info'] = $this->Asset_model->get_order($oid);
		// $this->load->view('home/tcket_temp', $get_event);
		// echo "<pre>";
		// print_r($get_event);
		// return;
		$to_email = $get_event['event_info'][0]['email'];
		$from_email = "info@tickets4u.co.ke";
	     $this->email->from($from_email, 'tickets4u'); 
	     $this->email->to($to_email);
	     $this->email->subject('Download your Ticket'); 
	     $this->email->message($this->load->view('home/tcket_temp', $get_event, TRUE)); 
	     $this->email->set_mailtype("html");

	     //Send mail 
	     $send = $this->email->send();
	    
	}

	public function sendSms()
	{
		$oid = "6789";
		$phone = "0705118708";
	     if(strlen($phone) != 10  or substr($phone, 0, 2) != "07"):return "invalid phone number ". $phone; endif;
	      //add 254 to phone number
	     $phone = "254".substr($phone, 1, 9);
	      
	    $username = "Intrepid";
	    $password = "Test1234";
	    
	    $link     = base_url()."index.php/ViewTickets?order=$oid";
	    
	    $shortUrl = $this->urlShorten($link);
	    $shortUrl = json_decode($shortUrl);
		
	    
	    if ($shortUrl->status_code != 200) {
	      //print_r($shortUrl);
	    }   
	    else
	    {
	    $link = $shortUrl->data->url;
	    $message = "Successful payment to ipay. To Download your ticket click on this link: $link \n";
	    $data = array( "to" => $phone, 
	    			"sender" => "intrepid",
	    			"msg" => $message, 
	    			"u" => $username, 
	    			"p" => $password );

	    $json_encoded_data = json_encode($data);
	    $query = http_build_query($data);

	    $url = "http://sms3.intrepid.co.ke/api/sms?".$query;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($ch);
	    curl_close($ch);
	    $response = json_decode($response);

	    //print_r($response);
	    //return $response->messageId;
	    }
	}

	private function urlShorten($link)
    {
  
	    $url = "https://api-ssl.bitly.com/v3/shorten?access_token=995403f35c33699fd221d312b0aab6a22cd2725e&longUrl=$link";
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($ch);
	    curl_close($ch);

	    return $response;
    }

    public function viewTickets()
    {

		$orderId = $_GET['order'];
		//get event details
    	$get_event['event_info'] = $this->Asset_model->get_order($orderId);

    	$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/viewtickets', $get_event);
		$this->load->view('global/footer');
    }

    //download ticket pdf
    public function printTicket()
    {
    	//fetch from db all tickets where serial
		$ticket_serial_number = $_GET['serial'];
		//load model
		$data = $this->Asset_model->get_specific_ticket($ticket_serial_number);
		
		$data['event_tittle'] = $data['events'][0]['event_title'];
		$data['event_date'] = $data['events'][0]['event_date'];
		$data['time']  ="from 9:00am - 12 noon";
		$data['location'] = $data['events'][0]['event_venue'];

        $filename = $data['tickets'][0]['serial_number'].".pdf";

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('home/printTicket' , $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'D');	
    }


}