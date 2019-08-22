<?php
class Front_page_model extends CI_Model{
	public function __construct()
	{
            
	     $this->load->database();
	}

	public function event_category(){
		$query = $this->db->get('category');
		$res = $query->result_array();

		return $res;

	}

	public function event_date(){
		$query = $this->db->select('events.event_date');

		return $query;

	}

	public function event_by_category($id){
		$this->db->where('events.event_category_id', $id);
		$this->db->where('events.event_status', 1);
		$this->db->where('event_date >=', date('Y-m-d'));
		$this->db->select('events.account_id, events.event_title, events.event_venue, events.event_coodinates, events.event_date, events.event_category_id, event_Assets.event_id, event_Assets.cover_image, event_Assets.sponsor_logo, event_Assets.video, event_Assets.event_description, category.category_name');
		$this->db->from('events');
		$this->db->join('event_Assets', 'event_Assets.event_id = events.id');
		$this->db->join('category', 'category.id = events.event_category_id');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function upcoming_events($limit, $start)
	{
		$this->db->where('events.event_status', 1);
		$this->db->where('event_date >', date('Y-m-d'));
		$this->db->select('events.account_id, events.event_title, events.event_venue, events.event_coodinates, events.event_date, events.event_category_id, event_Assets.event_id, event_Assets.cover_image, event_Assets.sponsor_logo, event_Assets.video, event_Assets.event_description, category.category_name');
		$this->db->from('events');
		$this->db->join('event_Assets', 'event_Assets.event_id = events.id');
		$this->db->join('category', 'category.id = events.event_category_id');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function count_events()
	{
		$this->db->where('events.event_status', 1);
		$this->db->where('event_date >', date('Y-m-d'));
		$query = $this->db->get('events');

		return $query->num_rows();
	}

	public function subscribe($data){
		$this->db->where($data);
		//$this->db->select('sub_mail');
		//$this->db->from('subscribers');
		$query = $this->db->get('subscribers');
		$result = $query->row();

		if($result != NULL){
			$this->session->set_tempdata('failed', 'User email exist', 3);
			return redirect('', 'refresh');
		}

		$this->db->insert('subscribers', $data);
		$insert_id = $this->db->insert_id();

		if ($insert_id) {
			$this->session->set_tempdata('success', 'Subscription successful', 3);
		} else {
			$this->session->set_tempdata('fail', 'Subscription Failed, try again or contact customer care', 3);
		}

		return redirect('', 'refresh');
	}
}
?>