<?php

class Idea_Application_Resource_Jquery
	extends Zend_Application_Resource_ResourceAbstract
{

	public function init()
	{

		$this->getBootstrap()->bootstrap('view');
		$view = $this->getBootstrap()->getResource('view');

		$options = $this->getOptions();

		if (array_key_exists('library', $options)
			&& (string)$options['library']
		) {

			$view->headScript()->appendFile((string)$options['library']);

		}

		if (array_key_exists('ui', $options)
			&& is_array($options['ui'])
			&& !empty($options['ui'])
		) {

			if (array_key_exists('library', $options['ui'])
				&& (string)$options['ui']['library']
			) {

				$view->headScript()->appendFile((string)$options['ui']['library']);

			}

			if (array_key_exists('style', $options['ui'])
				&& (string)$options['ui']['style']
			) {

				$view->headLink()->appendStylesheet((string)$options['ui']['style']);

			}

		}

		if (array_key_exists('noConflictMode', $options)
			&& $options['noConflictMode']
		){

			$jQuery = array_key_exists('noConflictMode', $options)
				? (string)$options['noConflictMode'] : '$j';

			$view->headScript()->captureStart();
?>
	<?php echo $jQuery ?> = jQuery.noConflict();
<?php
			$view->headScript()->captureEnd();

		}

		if (array_key_exists('plugins', $options)
			&& is_array($options['plugins'])
		) {

			foreach ($options['plugins'] as $plugin) {

				$view->headScript()->appendFile((string)$plugin);

			}

		}

		return $view;

	}

}
