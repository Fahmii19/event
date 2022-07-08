<?php

class DataKegiatan extends CI_Model
{
    private $table = "kegiatan";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id = null)
    {
        $this->db->from('kegiatan');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM kegiatan WHERE id=?";
        $this->db->query($sql, $id);
    }

    public function save_kegiatan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getDataKegiatan($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function edit_kegiatan($id, $data)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    public function getDetails($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }
}
