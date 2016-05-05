<?php
namespace Excellence\Table\Block;
class Main extends \Magento\Framework\View\Element\Template
{   
    protected $_testFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Table\Model\TestFactory $testFactory,
        array $data = []
    )
    {
        
        $this->_testFactory = $testFactory;
        parent::__construct($context, $data);
        $test = $this->_testFactory->create()->getCollection()->setOrder('excellence_table_test_id','desc');
        $this->setTestModel($test);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if($this->getTestModel())
        {    
            $pager = $this->getLayout()->createBlock(
                 'Magento\Theme\Block\Html\Pager',
                 'sales.order.history.pager'
            );
            $pager->setLimit(5)->setShowAmounts(false)->setTestModel($this->getTestModel());
            $this->setChild('pager', $pager);
            $this->getTestModel()->load();    
        } 
        return $this;  

    }
   public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
	public function getEditUrl($id)
    {
        return $this->_urlBuilder->getUrl("excellence/index/edit/", array('id' => $id));
    }
    public function getAddUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/Add");
    }
    
    public function getDeleteUrl($id)
    {
        return $this->_urlBuilder->getUrl("excellence/index/delete/", array('id' => $id));
    }
    public function getListUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/index/");
    }

}
?>
