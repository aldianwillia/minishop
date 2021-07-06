<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model 
{
    //function memanggil seluruh data barang//
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        //join tbl_kategori (id_ketegori) dengan tbl_barang (id_kategori)//
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->order_by('tbl_barang.id_barang', 'desc');
        return $this->db->get()->result();
    }

    //memanggil data barang berdasarkan id_barang//
    public function get_data($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        //join tbl_kategori (id_ketegori) dengan tbl_barang (id_kategori)//
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    //function insert barang ke data barang (tbl_barang)//
    public function add($data)
    {
        $this->db->insert('tbl_barang', $data);
        
    }

    // function Edit data barang
    public function edit($data)
    {   
        //seleksi data berdasarkan id_barang
        $this->db->where('id_barang', $data['id_barang']);
        //update data barang
        $this->db->update('tbl_barang', $data);

    }

    // function delet data barang berdasarkan id_barang
    public function delete($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('tbl_barang', $data);

    }
}