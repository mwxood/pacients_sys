<?php

namespace App\Models;

use CodeIgniter\Model;

class PacientsModel extends Model
{
    protected $activity_table = 'last_activity';

    // function __construct() {
    //     parent::construct();
    // }

    // public function get_log($id) {
    //     $result = $this->db->get_where(['last_activity', array('id' => $id)])->row_array();
    //     $db_error = $this->error();

    //     if(!empty($db_error['code'])) {
    //         echo 'Database error';
    //         exit;
    //     }

    //     return $result;
    // }


    // public function get_all_log($id) {
    //    $this->db->order_by('id', 'desc');
    //    $result = $this->db-get('last_activity')->result_array();
    //    $db_error = $this->db->error();
    //    if(!empty($db_error['code'])) {
    //         echo 'Database error';
    //        exit;
    //    }

    //    return $result;
    // }

    // public function get_limit_log($limit, $start) {
    //     $this->db->order_by('id', 'desc');
    //     $this->db->limit($limit, $start);
    //     $result = $this->db->get('last_activity')->result_array();
    //     $db_error = $this->db->error();

    //     if(!empty($db_error['code'])) {
    //         echo 'Database error';
    //        exit;
    //    }

    //    return $result;
    // }

    // public function get_count_log() {
    //     $result = $this->db->from('last_activity')->count_all_results();
    //     $db_error = $this->db->error();

    //     if(!empty($db_error['code'])) {
    //         echo 'Database error';
    //        exit;
    //    }

    //    return $result;
    // }

    // public function add_log($params) {
    //     $this->db-insert('last_activity', $params);
    //     $id = $this->db->insert_id();
    //     $db_error = $this->db->error();

    //     if(!empty($db_error['code'])) {
    //         echo 'Database error';
    //        exit;
    //    }

    //    return $id;
    // }

    // public function update_log($id, $params) {
    //     $this->db->where('id', $id);
    //     $status = $this->db->update('log', $params);

    //     $db_error = $this->db->error();

    //     if(!empty($db_error['code'])) {
    //         echo 'Database error';
    //        exit;
    //    }

    //    return $status;
    // }   

}