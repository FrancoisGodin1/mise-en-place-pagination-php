<?php

class Livre extends CI_Controller {

    // Seule la où les fonction(s) concernée(s) sont affichée(s)
    
    function index() {
        $config['base_url'] = site_url() . '/Livre/index/page';
        $config['total_rows'] = $this->livreModel->get_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(4, 0);
        if ($page > 0) {
            $page = $page * 10 - 10;
        }
        $data['livres'] = $this->livreModel->get_all_livres($page, $config['per_page']);
        $links = $this->pagination->create_links();
        $data['links'] = $links;

        //$data['livres']=$this->livreModel->get_all_livres();
        $data['title'] = 'Les Livres';
        $this->load->view('AppHeader', $data);
        $this->load->view('LivreIndex', $data);
        $this->load->view('AppFooter', $data);
    }

    function upload_image() {
        if (!$this->upload->do_upload('couverture')) {

            $error = TRUE;
        } else {
            $error = FALSE;
        }
        return $error;
    }
}
