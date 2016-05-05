<?php
namespace Excellence\Table\Model\ResourceModel;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_table_test','excellence_table_test_id');
    }
    
}
?>