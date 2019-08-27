<?php 
class Asset_model extends CI_Model{
	public function __construct(){
            
	     $this->load->database();
	}

//load home
	public function get_home()
	{
		$this->db->where('events.event_status', 1);
		$this->db->where('events.end_date >=', date('Y-m-d'));
		$this->db->select('events.event_title, events.event_venue ,event_Assets.event_id, event_Assets.slider_image, event_Assets.cover_image');
		$this->db->from('events');
		$this->db->join('event_Assets', 'events.id = event_Assets.event_id' );
      	$this->db->order_by('event_Assets.id', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}
  
  public function get_thumbs()
	{
		$this->db->where('events.event_status', 1);
		//$this->db->where('events.event_date >=', date('Y-m-d'));
		$this->db->select('events.event_title, events.event_venue ,events.event_date,event_Assets.event_id, event_Assets.slider_image, event_Assets.cover_image');
		$this->db->from('events');
		$this->db->join('event_Assets', 'events.id = event_Assets.event_id' );
      	$this->db->order_by('event_Assets.id', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_orderAssets($id)
	{
		$this->db->where('events.id', $id);
		$this->db->select('events.event_title, events.event_venue, events.event_date, event_Assets.cover_image, event_Assets.sponsor_logo, event_Assets.video, event_Assets.event_description, events.end_date');
		$this->db->from('events');
		$this->db->join('event_Assets', 'events.id = event_Assets.event_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_tickets_type($id)
	{
		$this->db->where('event_id', $id);
		$this->db->select('event_id, ticket_type, amount, available_tickets, ticket_close_on, typeid, type_name');
		$this->db->from('event_tickets_types');
		$this->db->join('ticket_types', 'ticket_types.typeid = event_tickets_types.ticket_type');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function make_order($data)
	{
		$this->db->insert('sell_ticket', $data);
		return $this->db->insert_id();
	}

	public function update_order($oid, $data)
	{
		$this->db->where('order_id', $oid);
		$this->db->update('sell_ticket', $data);
		return $this->db->affected_rows();
	}

	public function get_order($id)
	{
		$this->db->where('order_id', $id);
		$this->db->select('events.id, events.event_title, events.event_venue, events.event_coodinates, events.event_date, sell_ticket.number_of_tickets, sell_ticket.ticket_amount, sell_ticket.ticket_type, sell_ticket.clientName, sell_ticket.phone,
						sell_ticket.email, sell_ticket.order_id, sell_ticket.serial_number, sell_ticket.used_status, sell_ticket.transaction_status, sell_ticket.attendance_date');
		$this->db->from('sell_ticket');
		$this->db->join('events', 'sell_ticket.event_id = events.id');
		$query = $this->db->get();
		return $query->result_array();
	}
  
  	public function updateAvailableTickets($event_id, $ord, $tickets)
	{
		for ($i=0; $i < sizeof($tickets); $i++) { 
			//get available tickets
			$this->db->where('sell_ticket.order_id', $ord);
			$this->db->where('sell_ticket.ticket_type', $tickets[$i]);
			$this->db->where('sell_ticket.event_id', $event_id);
			$this->db->select('sell_ticket.number_of_tickets as soldTickets, event_tickets_types.available_tickets as availableTickets');
			$this->db->from('event_tickets_types');
			$this->db->join('sell_ticket', 'sell_ticket.event_id = event_tickets_types.event_id');
			$query = $this->db->get();
			$query = $query->result_array();

			//update availble tickets
			$available_tickets = ($query[$i]['availableTickets'] - $query[$i]['soldTickets']);
			$data = array('available_tickets' => $available_tickets);
			$this->db->where('ticket_type', $tickets[$i]);
			$this->db->where('event_id', $event_id);
			$this->db->update('event_tickets_types', $data);

			$test = array('query' => $query, 
							'available' => $available_tickets);
		}
	}

	//get_specific_ticket
	public function get_specific_ticket($ticket_serial_number){

		$this->db->where('serial_number',$ticket_serial_number);
		$query_sell_ticket = $this->db->get('sell_ticket');
		if ($query_sell_ticket->result_array()[0]['event_id']) {
			$this->db->where('id', $query_sell_ticket->result_array()[0]['event_id']);
			$this->db->select('event_title, event_date, event_venue');
			$query_events = $this->db->get('events');
		}

		$query = array('tickets' => $query_sell_ticket->result_array(), 
						'events' => $query_events->result_array());
		return $query;
	}

	public function get_Commision($event_id)
	{
		$this->db->where('events.id', $event_id);
		$this->db->select('events.id as event_id, events.account_id, events.ipay_commission, accounts.id as acc_id, 
			accounts.available_balance');
		$this->db->from('accounts');
		$this->db->join('events', 'accounts.id = events.account_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_Funds($account_id, $data)
	{
		$this->db->where('id', $account_id);
		$this->db->update('accounts', $data);
		return $this->db->affected_rows();
	}
	
}