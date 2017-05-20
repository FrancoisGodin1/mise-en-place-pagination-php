<?php

class Livre extends CI_Controller {

    // Seule la où les fonction(s) concernée(s) sont affichée(s)
    // Il s'agit de faire évoluer la méthode index de manière à ce qu'elle tienne comte de la pagination
    // codeIgniter propose une bibliothèque et une classe permettant de mettre en oeuvre cette pagination
    // il faut donc au préalable charger le librairie 'pagination' dans le constructeur 
    
    function index() {
        // préparation de la pagination
        $config['base_url'] = site_url() . '/Livre/index/page'; // ajoute la page de pagination dans l'uri
        $config['total_rows'] = $this->livreModel->get_count(); //récupere le nb de livres total et l'initialise dans la pagination
        $config['per_page'] = 10; // nb de livres par pages
        $config['uri_segment'] = 4; // en quel position se trouve le numéro de page dans l'uri
        $config['use_page_numbers'] = TRUE; 
        $this->pagination->initialize($config); 
        $page = $this->uri->segment(4, 0); // recup le numéro de page ou le rang du 1er livre
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
