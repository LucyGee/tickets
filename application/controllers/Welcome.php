<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		//$id = $this->input->get('me', TRUE);
		//set id to session
		//$data = array('id' => $id);
		//$this->session->set_userdata($data);

		//$ticket_close_on=$this->Asset_model->get_tickets_type($id);
		//load model
		$homeScreen = array(
			'homescreen' => $this->Asset_model->get_home(),
			'thumbs' => $this->Asset_model->get_thumbs(),
			'event_category' => $this->Front_page_model->event_category(),
			'event_date' => $this->Front_page_model->event_date(),
		);
	
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/index',$homeScreen);
		$this->load->view('global/footer');
		
	}
	public function about()
	{
		
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/about');
		$this->load->view('global/footer');
		
	}

	public function event_category($id)
	{
		$event_cat = $this->Front_page_model->event_by_category($id);
		
		if ($event_cat) {
			$name1="UPCOMING EVENT:";
			$name2= $event_cat[0]['category_name'];
			$name= $name1.$name2;// concatenation in php
		} else {
			$name = "NO UPCOMING EVENT";
		}
		$event_category = array(
			'events' => $this->Front_page_model->event_by_category($id),
			'name' => $name,
		);

		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('main/event_category', $event_category);
		$this->load->view('global/footer');
	}

	public function subscribers(){
		$email = array(
			'sub_mail'=>$_POST['email']
		);
		$result_success = $this->Front_page_model->subscribe($email);
	}

	public function events(){
		//Loading count from database
		$count_event = $this->Front_page_model->count_events();



		////////////////////////////////////////////////
		$config = array();
        $config["base_url"] = base_url() . "index.php/upcoming_events/";
        $config['first_url'] = '0';
        $config["per_page"] = 4;
        $config["uri_segment"] = 2;
        $config['next_link'] = ' NEXT';
        $config['prev_link'] = ' PREVIOUS ';
        $config["total_rows"] = $count_event;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        
        /////////////////////////////////////
		$upcoming_events = array(
			'events' => $this->Front_page_model->upcoming_events($config["per_page"], $page),
			'event_count' => count($this->Front_page_model->upcoming_events($config["per_page"], $page)),
			'links' => $this->pagination->create_links(),
		);

		
		//$data["links"] = $this->pagination->create_links();

		//count($upcoming_events['events'])
		
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('main/upcomingevents', $upcoming_events);
		$this->load->view('global/footer');
	}

	public function terms_of_service()
	{
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/terms_of_service');
		$this->load->view('global/footer');
		
	}
	public function privacy_policy()
	{
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/privacy_policy');
		$this->load->view('global/footer');
		
	}
	public function comingsoon()
	{
		$data['title'] = "Tickets4U::Tickets4U";
		$this->load->view('global/header',$data);
		$this->load->view('global/menu');
		$this->load->view('home/comingsoon');
		$this->load->view('global/footer');
		
	}
}