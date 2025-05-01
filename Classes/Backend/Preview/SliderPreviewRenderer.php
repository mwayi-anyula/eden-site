<?php
namespace MwayiAnyula\EdenSite\Backend\Preview;

use TYPO3\CMS\Backend\Preview\StandardContentPreviewRenderer;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;

class SliderPreviewRenderer extends StandardContentPreviewRenderer
{
    public function renderPageModulePreviewContent(GridColumnItem $item): string
    {
        $content = parent::renderPageModulePreviewContent($item);
        $record = $item->getRecord();
        
        $sliderItems = $this->getDatabaseConnection()->exec_SELECTcountRows(
            'uid',
            'tx_edensite_slider_item',
            'parentid=' . (int)$record['uid'] . ' AND parenttable=\'tt_content\''
        );
        
        $content .= '<div class="mt-2"><strong>Slider Items:</strong> ' . $sliderItems . '</div>';
        
        return $content;
    }
    
    protected function getDatabaseConnection()
    {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Database\ConnectionPool::class
        )->getConnectionForTable('tx_edensite_slider_item');
    }
}

// This code is a custom preview renderer for a TYPO3 extension that handles slider content elements.	    
// It extends the StandardContentPreviewRenderer class to provide a custom preview for the slider content element in the backend.
// The renderPageModulePreviewContent method is overridden to add a count of slider items associated with the content element.
// The getDatabaseConnection method is used to get a connection to the database table that stores the slider items.
// The class is registered in the ext_localconf.php file to replace the default preview renderer for the slider content element.
// The renderPageModulePreviewContent method is called when rendering the preview in the backend module, and it appends the count of slider items to the preview content.
// The getDatabaseConnection method is used to get a connection to the database table that stores the slider items.
// The class is registered in the ext_localconf.php file to replace the default preview renderer for the slider content element.
// The renderPageModulePreviewContent method is called when rendering the preview in the backend module, and it appends the count of slider items to the preview content.
// The class is registered in the ext_localconf.php file to replace the default preview renderer for the slider content element.
// The renderPageModulePreviewContent method is called when rendering the preview in the backend module, and it appends the count of slider items to the preview content.
// The getDatabaseConnection method is used to get a connection to the database table that stores the slider items.
// The class is registered in the ext_localconf.php file to replace the default preview renderer for the slider content element.
// The renderPageModulePreviewContent method is called when rendering the preview in the backend module, and it appends the count of slider items to the preview content.
// The getDatabaseConnection method is used to get a connection to the database table that stores the slider items.
// The class is registered in the ext_localconf.php file to replace the default preview renderer for the slider content element.