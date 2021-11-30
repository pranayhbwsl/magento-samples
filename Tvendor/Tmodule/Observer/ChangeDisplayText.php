<?php

namespace Tvendor\Tmodule\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		$displayText = $observer->getData('display_text');
		echo $displayText->getText() . " - Event </br>";
		$displayText->setText('Execute event successfully.');

		return $this;
	}
}
