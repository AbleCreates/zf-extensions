<?php

require_once 'Zend/Application/Resource/ResourceAbstract.php';

class Able_Application_Resource_Facebook
	extends Zend_Application_Resource_ResourceAbstract
{

	public function init()
	{

		$this->getBootstrap()->bootstrap('view');
		$view = $this->getBootstrap()->getResource('view');

		$options = $this->getOptions();

		if (!array_key_exists('application', $options)) {
			return;
		}

		$appId = $options['application']['id'];
		$channelUrl = $options['application']['channelUrl'];

		$view->inlineScript()->captureStart();
?>
	window.fbAsyncInit = function() {

		FB.init({
			appId: '<?php echo $appId ?>',
			status: true,
			cookie: true,
			xfbml: true,
			channelUrl: '<?php echo $channelUrl ?>'
		});

	};

	(function() {

		var e = document.createElement('script');
		e.type = 'text/javascript';
		e.src = document.location.protocol +
			'//connect.facebook.net/en_GB/all.js';
		e.async = true;
		document.getElementById('fb-root').appendChild(e);

	}());

<?php

		$view->inlineScript()->captureEnd();


	}


}
