<?php

class M_category extends CI_Model
{
    function getCategory($where)
    {
        $this->db->from('category');

        if($where){
            $this->db->where($where);
            return $this->db->get()->row();
        }

        return $this->db->get()->result();
    }
}