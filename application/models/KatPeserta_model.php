<?php

class KatPeserta_model extends CI_Model
{
    private $table = "kategori_peserta";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM kategori_peserta WHERE id=?";
        $this->db->query($sql, $id);
    }

    public function save_peserta($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getDataPeserta($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function edit_katpeserta($id, $data)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }
}
