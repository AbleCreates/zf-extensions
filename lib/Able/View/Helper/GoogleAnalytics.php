<?php

class Able_View_Helper_GoogleAnalytics extends Zend_View_Helper_Abstract
{

	public function googleAnalytics($id = null)
	{

	    if (is_null($id)) {
	        return;
	    }

		$javascript = <<<JS
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '{$id}']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
JS;

		return $javascript;

	}

}