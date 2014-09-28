<?php
class Web_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('carousel_model');
		$this->load->model('category_model');

	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function index()
	{
		$data['recCarousel']=$this->carousel_model->getcarousel();
		$data['recCategory']=$this->category_model->getcategory();
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['page']='content/home';
		$this->load->view('layout',$data);
	}
}
