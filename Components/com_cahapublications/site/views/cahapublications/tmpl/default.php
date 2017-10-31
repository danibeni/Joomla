<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>
<?php 
    $document = JFactory::getDocument();
    $document->addStyleSheet($this->baseurl.'/media/jui/css/icomoon.css');
    $document->addStyleSheet('media/com_cahapublications/css/cahapublications.css');
    $document->addScriptDeclaration('
        
        
        jQuery(document).ready(function($) {                
			$("#footnote_link").click(function(){
                $("#footnote_text").slideToggle("slow");
			});
            
            $("a.pub_link").click(function(){
                 $(this).closest("tr").next("tr").find(".pub_text").slideToggle("slow", function() {
                    $(this).parent().find(".pub_details").slideToggle("slow");
                });                
                
            });
            
            var display_text_span ="<span>" + Joomla.JText._("COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_PAGINATION_DISPLAY") + "</span>";
            
            $(display_text_span).insertBefore("select.input-mini");
		});
    ');    
?>
<script language="javascript" type="text/javascript">
		
</script>
<form action="<?php echo JRoute::_('index.php?option=com_cahapublications'); ?>" method="post" id="adminForm" name="adminForm">
	 <h1 class="item-title"><?php echo JText::_('COM_CAHAPUBLICATIONS_BASED_ON_OBSERVATION_AT_CALAR_ALTO'); ?></h1><br />
      <div id="footnote">
      		<a href="javascript:void(0)" id="footnote_link">Footnote to be included in your articles</a>
      		<div id="footnote_text">
      			<p><?php echo JText::_('COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_BIBLIOGRAPHIC_DATA'); ?></p>
				<p>
					<a class="moz-txt-link-freetext" href="http://www.caha.es/CAHA/Applications/index.html"></a><a href="http://www.caha.es/CAHA/Applications/index.html">http://www.caha.es/CAHA/Applications/index.html</a>
				</p>
				<p><?php echo JText::_('COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_MUST_CONTAINS_FOOTNOTE'); ?><span style="font-size: 0.8em;">&nbsp;</span></p>
				<p><strong><?php echo JText::_('COM_CAHAPUBLICATIONS_BASED_ON_OBSERVATION_COLLECTED'); ?></strong></p>
      		</div>
      </div>
      
<div id="article_search">	
		<div class="row-fluid">
		<div class="span6">
			<?php 
			     JText::script('COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_PAGINATION_DISPLAY');
			?>
			<strong><?php echo JText::_('COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_FILTER'); ?></strong>
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>	
</div>
<table id="table_publications" width="100%" border="0" cellspacing="5" cellpadding="5">
<thead>
    <tr>
    	<th width="20%"> 
    		<?php echo JHtml::_('grid.sort', 'COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_AUTHOR', 'author', $listDirn, $listOrder); ?>
    	</th>
    	<th> 
    		<?php echo JHtml::_('grid.sort', 'COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_TITLE', 'title', $listDirn, $listOrder); ?> 
    	</th>
    	<th class="year" width="10%">
    		<?php echo JHtml::_('grid.sort', 'COM_CAHAPUBLICATIONS_CAHAPUBLICATIONS_YEAR', 'year', $listDirn, $listOrder); ?>
    	 </th>
    </tr>
</thead>
<tfoot>
	<tr>
		<td colspan="3">
			<?php echo $this->pagination->getListFooter(); ?>
		</td>
	</tr>
</tfoot>
<tbody>
    <?php foreach ($this->items as $item) : ?>
    <tr >
    	<td>
    		<?php echo $this->escape($item->author); ?>
    	</td>
    	<td>
    		<a href="javascript:void(0)" class="pub_link">
    			<?php echo $this->escape($item->title); ?>
    		</a>
    	</td>
    	<td class="year">
    		<?php echo $item->year; ?>
    	</td>
    </tr>
    <tr>
    	<td colspan="3">
    		<div id="det_id<?php echo $item->id; ?>" >
    			<div class="pub_text">
    				<?php echo $item->text; ?>
    			</div>
    			<div class="pub_details">
    			<table width="100%" padding="2" class="sectiontableentry1" style="background-color:#dae8f0;text-align:center">
    				<tr style="background-color:#78b7e1;">
    					<td>1st Author</td>
    					<td>Spanish Co/Author</td>
    					<td>German Co/Author</td>
    					<td>CSIC Co/Author</td>
    					<td>MPG Co/Author</td>
    					<td>Telescopes</td>
    					<td>Instruments</td>
    				</tr>
    				<tr>
    					<td><?php echo $item->f_author; ?></td>
    					<td><?php echo $item->s_author; ?></td>
    					<td><?php echo $item->g_author; ?></td>
    					<td><?php echo $item->iaa_author; ?></td>
    					<td><?php echo $item->mpia_author; ?></td>	
    					<td>
    						<?php 
        						$teles = preg_split('/((?<!\\\|\r)\n)|((?<!\\\)\r\n)/', $item->telescopes);
        						
        						echo $item->telescopes;
    						 ?>	
    					</td>
    					<td><?php 
    						//$instrum = explode(",",$item->pinstruments);
    						//$instrum = explode("\n", $item->pinstruments);
    						$instrum = preg_split('/((?<!\\\|\r)\n)|((?<!\\\)\r\n)/', $item->instruments);
    						echo $item->instruments;
    					     ?>
    					</td>
    				</tr>
    			</table>			
    			</div>
    		</div>	 
    			
    	</td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>

<input type="hidden" name="task" value="" />
<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
<?php echo JHtml::_('form.token'); ?>
</form>
