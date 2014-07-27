<?php
/**
 * TbListView class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

Yii::import('zii.widgets.CListView');

/**
 * Bootstrap Zii list view.
 */
class TbListView extends CListView
{
	/**
	 * @var string the CSS class name for the pager container. Defaults to 'pagination'.
	 */
	public $pagerCssClass = 'pagination';
	/**
	 * @var array the configuration for the pager.
	 * Defaults to <code>array('class'=>'ext.bootstrap.widgets.TbPager')</code>.
	 */
	public $pager = array('class'=>'bootstrap.widgets.TbPager');
	/**
	 * @var string the URL of the CSS file used by this detail view.
	 * Defaults to false, meaning that no CSS will be included.
	 */
	public $cssFile = false;


	public $preItemsTag = '';
	public $postItemsTag = '';
	
	public function renderItems() {
		$data = $this->dataProvider->getData ();
		if (($n = count ( $data )) > 0) {
			echo $this->preItemsTag . "\n";
			$owner = $this->getOwner ();
			$render = $owner instanceof CController ? 'renderPartial' : 'render';
			$j = 0;
			foreach ( $data as $i => $item ) {
				$data = $this->viewData;
				$data ['index'] = $i;
				$data ['data'] = $item;
				$data ['widget'] = $this;
				$owner->$render ( $this->itemView, $data );
				if ($j ++ < $n - 1)
					echo $this->separator;
			}
			echo $this->postItemsTag . "\n";
		} else
			$this->renderEmptyText ();
	
	}
}
