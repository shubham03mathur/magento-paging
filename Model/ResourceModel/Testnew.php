<?php
namespace Excellence\Table\Model\ResourceModel;
use \Magento\Framework\App\ResourceConnection;
class Testnew extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_user_profile','user_id');
    }
    public function saveStatus($status,$id){
        if(isset($status)){
           //print_r('saveStatus Function Called');
            $this->setUserId($id);
            $this->setIsActive($status);
            $this->save();

        }       
    }


}
?>