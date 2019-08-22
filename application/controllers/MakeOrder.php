<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MakeOrder extends CI_Controller {

	public function index()
	{
		$id = $this->input->get('me', TRUE);
		//set id to session
		$data = array('id' => $id);
		$this->session->set_userdata($data);

		//load model to get event details
		$makeOrders = $this->Asset_model->get_orderAssets($id);
      //var_dump($makeOrders);
		
		//exit if nothing found
		if (!$makeOrders) {
			redirect('', 'refresh');
		}
		
		//load model to get ticket types
		$ticketType = $this->Asset_model->get_tickets_type($id);

		//exit if nothing found
		if (!$ticketType) {
			redirect('', 'refresh');
		}

		$makeOrder = array('makeOrder' => $makeOrders,
							'ticketType' => $ticketType);

		// echo "<pre>";
		// print_r($makeOrder);
      
      //var_dump($makeOrder);

		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/makeOrder', $makeOrder);
		$this->load->view('global/footer');
	}

	public function reviewOrder()
	{
		$data = ['my_order'];       
		$this->session->unset_userdata($data);

		//get session
		$event_id = " ".$_SESSION['id']."";

		//get post data
		$sum = 0;
		foreach ($_POST as $key => $value) {
			$sum = ($sum + $value);
		}

		if ($sum < 1) {
			redirect('index.php/event?me='.$event_id, 'refresh');
		}

		//load model to get ticket types
		$ticketType = $this->Asset_model->get_tickets_type($event_id);

		$reviewOrder = array();
		$count = 0;
		foreach ($ticketType as $key => $value) {
			$count++;
			$ticket_count = $this->input->post($count);
		
			$order = array('event_id' => $value['event_id'],
							'no_of_tickets' => $ticket_count,
							'ticket_name' => $value['ticket_type'],
							'amount' => $value['amount']);
			
			array_push($reviewOrder, $order);
		}

		$reviewOrder = array('order' => $reviewOrder);

		$this->session->set_userdata('my_order', $reviewOrder);

		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/orderReview', $reviewOrder);
		$this->load->view('global/footer');
	}

	public function callipay()
	{
		$order = $this->session->userdata('my_order');

		if (empty($order)) {
			redirect('', 'refresh');
			return;
		}

		if (empty($_POST)) {
			redirect('', 'refresh');
			return;
		}
		
		$order_id = substr(md5(date('Y-m-d H:i')), 0, 5);

		$total = 0;
		$count = 0;
      	$tname = '';
      	$phone = '';
      	$oid = '';
       
		foreach ($order['order'] as $key => $value) {
			$count++;
          	$tname = $value['ticket_name'];
         	$phone = $this->input->post('phone');
			$serial_number = substr(md5($count.date('H:i:s.u')),0, 8);
			$total = $total + ($value['amount'] * $value['no_of_tickets']);
			$store_db = array('event_id' => $value['event_id'],
							  'number_of_tickets' => $value['no_of_tickets'],
							  'ticket_amount' => $value['amount'],
							  'ticket_type' => $value['ticket_name'],
							  'clientName' => $this->input->post('fullName'), 
							  'phone' => $this->input->post('phone'), 
							  'email' => $this->input->post('Email'),
							  'order_id' => $order_id,
							  'serial_number' => $serial_number,
							  'transaction_status' => 'PENDING',);
			//send to db
			$ticketType = $this->Asset_model->make_order($store_db);

			if (empty($ticketType)) {
				redirect('', 'refresh');
				return;
			}
		}
		if ($total < 1 ){
			if ($tname=="free") {
			//redirect('', 'refresh');
			//return
	          $theUrl = "index.php/Callback?txncd=".$tname."&phone=".$phone."&oid=".$order_id.'&ttl='.strval($total);
	          	redirect($theUrl, 'refresh');
          }
		}
      	else{
          //call ipay
          $autopay    = "1";
          $live		= 1; 
          $mm 		= 1; 
          $mb 		= 1; 
          $dc 		= 1; 
          $cc 		= 1; 
          $mer 		= "ipay"; 
          $oid 		= $order_id; 
          $inv		= $order_id;
          $ttl 		= $total;
          $tel 		= $this->input->post('phone');
          $eml 		= $this->input->post('Email'); 
          $vid		= 'tickets4u'; 
          $cur 		= 'KES'; 
          $p1 		= '';
          $p2 		= '';
          $p3 		= '';
          $p4 		= '';
          $cbk 		= base_url()."index.php/cbk";
          $cst 		= 1;
          $crl 		= 0;
          $hsh 		= "T145chge5879APdw4u";

          $datastring = $live.$oid.$inv.$ttl.$tel.$eml.$vid.$cur.$p1.$p2.$p3.$p4.$cbk.$cst.$crl;

          $hsh = hash_hmac('sha1', $datastring, $hsh);

          $cbk = urlencode($cbk);//url encode

          $theUrl = "https://payments.ipayafrica.com/v3/ke?live=$live&mm=$mm&mb=1&dc=1&cc=1&mer=$mer&oid=$oid&inv=$inv&ttl=$ttl&tel=$tel&eml=$eml&vid=$vid&p1=$p1&p2=$p2&p3=$p3&p4=$p4&crl=$crl&cbk=$cbk&cst=$cst&curr=$cur&hsh=$hsh&autopay=$autopay";

          header("location: $theUrl");
          exit();
    
	
		}
		
	
    }
}
