<?php

namespace Tvendor\Tmodule\Controller\Test;

class Test extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'LocalMagento'));
		$this->_eventManager->dispatch('tvendor_tmodule_display_text', ['display_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
    }
}
