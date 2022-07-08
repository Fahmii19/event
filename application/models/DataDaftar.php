<?php

class DataDaftar extends CI_Model
{
    private $table = "daftar";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM daftar WHERE id=?";
        $this->db->query($sql, $id);
    }

    public function save_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getDatadaftar($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function edit_daftar($id, $data)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }
}
