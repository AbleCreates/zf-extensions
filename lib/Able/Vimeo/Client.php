<?php

/** @see Zend_Service_Abstract */
require_once 'Zend/Service/Abstract.php';

class Able_Vimeo_Client extends Zend_Service_Abstract
{

	const BASE_URI = 'http://vimeo.com/api/v2';

	/** @var string */
	protected $_username;

	/**
	 *
	 * initialize the client
	 * @param string $username
	 */
	public function __construct($username)
	{

		$this->_username = $username;

	}

	/**
	 * get an array of all of the user's videos
	 * @return array
	 * @throws Zend_Service_Exception
	 */
	public function getAllVideos()
	{

		$response = $this->_makeRequest('all_videos');
		$xml = simplexml_load_string($response->getBody());

		$videos = array();

		foreach ($xml->video as $data) {

			$video = new Idea_Vimeo_Video();
			$video->setId((string)$data->id);
			$video->setTitle((string)$data->title);
			$video->setDescription((string)$data->description);
			$video->setUrl((string)$data->url);
			$video->setDuration((string)$data->duration);
			$video->setWidth((int)$data->width);
			$video->setHeight((int)$data->height);
			$video->setSmallThumbnail((string)$data->thumbnail_small);
			$video->setMediumThumbnail((string)$data->thumbnail_medium);
			$video->setLargeThumbnail((string)$data->thumbnail_large);

			try {

				$date = new DateTime((string)$data->upload_date);
				$video->setUploadDate($date);

			} catch (Exception $e) {

			}

			$tags = explode(', ', (string)$data->tags);
			$video->setTags($tags);

			$videos[] = $video;

		}

	}

    /**
     * make a request to the API
     *
     * @param  string uri of the api to access
     * @param  array $params request parameters
     * @param  string $method http method
     * @throws Zend_Service_Exception
     * @return string
     */
	protected function _makeRequest($method, $params = array(), $method = Zend_Http_Client::GET)
	{

		$client = self::getHttpClient();

		$uri = self::BASE_URI . '/' . $this->_username
			 . '/' . $uri . '.xml';

		$client->setUri($uri);

		$response = $client->request($method);

		if ($response->isSuccessful()) {
			return $response;
		}

		throw new Zend_Service_Exception('Unable to connect to Vimeo');

	}

	private function _getXml()
	{

		return <<<XML
<videos>
<video>
<id>21090878</id>
<title>Business RelationShip</title>
<description>This is the description - Garbage!</description>
<url>http://vimeo.com/21090878</url>
<upload_date>2011-03-15 19:46:31</upload_date>
<thumbnail_small>http://b.vimeocdn.com/ts/135/421/135421881_100.jpg</thumbnail_small>
<thumbnail_medium>http://b.vimeocdn.com/ts/135/421/135421881_200.jpg</thumbnail_medium>
<thumbnail_large>http://b.vimeocdn.com/ts/135/421/135421881_640.jpg</thumbnail_large>
<user_name>Able Creates</user_name>
<user_url>http://vimeo.com/ablecreates</user_url>
<user_portrait_small>http://a.vimeocdn.com/portraits/defaults/d.30.jpg</user_portrait_small>
<user_portrait_medium>http://a.vimeocdn.com/portraits/defaults/d.75.jpg</user_portrait_medium>
<user_portrait_large>http://a.vimeocdn.com/portraits/defaults/d.100.jpg</user_portrait_large>
<user_portrait_huge>http://a.vimeocdn.com/portraits/defaults/d.300.jpg</user_portrait_huge>
<stats_number_of_likes>0</stats_number_of_likes>
<stats_number_of_plays>0</stats_number_of_plays>
<stats_number_of_comments>0</stats_number_of_comments>
<duration>33</duration>
<width>640</width>
<height>480</height>
<tags>Animation, Promotion</tags>
</video>
</videos>
XML;

	}
}