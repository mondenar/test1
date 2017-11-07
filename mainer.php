<?php
class Advance extends Controller {

    public $project_name = 'advance';

    function Advance()
    {
        parent::Controller();
        $this->load->helper(array('form','asset','url'));
        $this->load->library('session');
        $this->load->model('advance/Advance_model');

        if($_GET) {

            //очищаем сессию
            $this->session->sess_destroy();
            //записываем get параметры в сессию
            $this->setSessionData($_GET);
            $call_id = $_GET ? $this->Advance_model->setCall($_GET) : NULL;
        }


        $data['project_name'] = $this->project_name;
        $data['html_meta_charset'] = '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />';
        $data['print_title'] = 'Эд ванс';
        $this->load->vars($data);

    }

    private function setSessionData($data) {
        $this->session->set_userdata($data);
    }

    function index() {
        $this->load->helper('file');
        $file_path = 'assets/files/'.$this->project_name.'/index.txt';
        $data['information'] = read_file($file_path);
        $file_path = 'assets/files/'.$this->project_name.'/company.txt';
        $data['company'] = read_file($file_path);
        $this->load->view($this->project_name.'/index', $data);

    }

    function editinformation() {
        $this->load->helper('file');
        $file_path = 'assets/files/'.$this->project_name.'/index.txt';

        if ($this->input->post('edit_information')) {
            write_file($file_path, $this->input->post('edit_information'), 'w');
            $this->index(5);
        }
        else {
            $this->load->helper('ckeditor');
            //Ckeditor's configuration
            $data['ckeditor'] = array(
                //ID of the textarea that will be replaced
                'id' 	=> 	'edit_information',
                'path'	=>	'assets/js/ckeditor',
                //Optionnal values
                'config' => array(
                    'toolbar' 	=> 	"Full", 	//Using the Full toolbar
                    'width' 	=> 	"1100px",	//Setting a custom width
                    'height' 	=> 	'400px',	//Setting a custom height
                    'skin'		=>	'v2'
                ),
                //Replacing styles from the "Styles tool"
                'styles' => array(
                    //Creating a new style named "style 1"
                    'style 1' => array (
                        'name' 		=> 	'Blue Title',
                        'element' 	=> 	'h2',
                        'styles' => array(
                            'color' 	=> 	'Blue',
                            'font-weight' 	=> 	'bold'
                        )
                    ),
                    //Creating a new style named "style 2"
                    'style 2' => array (
                        'name' 	=> 	'Red Title',
                        'element' 	=> 	'h2',
                        'styles' => array(
                            'color' 		=> 	'Red',
                            'font-weight' 		=> 	'bold',
                            'text-decoration'	=> 	'underline'
                        )
                    )
                )
            );
            $data['information'] = read_file($file_path);
            $this->load->view($this->project_name.'/editinformation', $data);
        }
    }

    function editcompany() {
        $this->load->helper('file');
        $file_path = 'assets/files/'.$this->project_name.'/company.txt';

        if ($this->input->post('edit_company')) {
            write_file($file_path, $this->input->post('edit_company'), 'w');
            $this->index(5);
        }
        else {
            $this->load->helper('ckeditor');
            //Ckeditor's configuration
            $data['ckeditor'] = array(
                //ID of the textarea that will be replaced
                'id' 	=> 	'edit_company',
                'path'	=>	'assets/js/ckeditor',
                //Optionnal values
                'config' => array(
                    'toolbar' 	=> 	"Full", 	//Using the Full toolbar
                    'width' 	=> 	"1100px",	//Setting a custom width
                    'height' 	=> 	'400px',	//Setting a custom height
                    'skin'		=>	'v2'
                ),
                //Replacing styles from the "Styles tool"
                'styles' => array(
                    //Creating a new style named "style 1"
                    'style 1' => array (
                        'name' 		=> 	'Blue Title',
                        'element' 	=> 	'h2',
                        'styles' => array(
                            'color' 	=> 	'Blue',
                            'font-weight' 	=> 	'bold'
                        )
                    ),
                    //Creating a new style named "style 2"
                    'style 2' => array (
                        'name' 	=> 	'Red Title',
                        'element' 	=> 	'h2',
                        'styles' => array(
                            'color' 		=> 	'Red',
                            'font-weight' 		=> 	'bold',
                            'text-decoration'	=> 	'underline'
                        )
                    )
                )
            );
            $data['company'] = read_file($file_path);
            $this->load->view($this->project_name.'/editcompany', $data);
        }
    }



}
