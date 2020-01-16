<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = " SELECT a.menu , b.*FROM user_menu a LEFT JOIN user_sub_menu b on (b.menu_id=a.id)
                    ";
        return $this->db->query($query)->result_array();
    }
}
