<?php
/**
 * Description of mUsuarios
 *
 * @author 5-09
 * @link http://localhost...
 * @example
 * @copyright
 */
class mAdmin extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
    }

    //=============== Generals Methods ==================//

    public function addField($table, $data){
    	$this->db->insert($table, $data);
    }

    public function modifyField($table, $id, $data){
    	$this->db->where("id", $id);
        $this->db->update($table, $data);
    }

    public function seeAllFields($table){
        return $this->db->get($table);
    }

    public function seeField($table, $field, $data){
        $this->db->where($field, $data);
        return $this->db->get($table);
    }

	//============== End General Methods =================//



    //---------------- User Methods -------------------//

    //-------------- End User Methods -----------------//



    //---------------- Team Methods -------------------//

    //-------------- End Team Methods -----------------//



    //---------------- Player Methods -------------------//

    //-------------- End Player Methods -----------------//



    //---------------- Bet Methods -------------------//

    //-------------- End Bet Methods -----------------//



    //---------------- Match Methods -------------------//

    //-------------- End Match Methods -----------------//



    //---------------- Match Methods -------------------//

    //-------------- End Match Methods -----------------//
}
?>