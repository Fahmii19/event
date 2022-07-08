<?php

class DataUser extends CI_Model
{
    private $table = "users";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id=?";
        $this->db->query($sql, $id);
    }

    public function save_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getDatauser($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function edit_user($id, $data)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }
}
