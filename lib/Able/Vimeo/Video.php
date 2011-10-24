<?php

class Able_Vimeo_Video
{

	const THUMBNAIL_SMALL = 'small';
	const THUMBNAIL_MEDIUM = 'medium';
	const THUMBNAIL_LARGE = 'large';

	/** @var string */
	protected $_id;

	/** @var string */
	protected $_title;

	/** @var string */
	protected $_description;

	/** @var string */
	protected $_url;

	/** @var DateTime */
	protected $_uploadDate;

	/** @var long */
	protected $_duration;

	/** @var int */
	protected $_width;

	/** @var int */
	protected $_height;

	/** @var array */
	protected $_tags;

	/** @var array */
	protected $_thumbnails;

	/**
	 *
	 * initialize the video
	 */
	public function __construct()
	{

		$this->_tags = array();
		$this->_thumbnails = array(self::THUMBNAIL_SMALL => '',
								   self::THUMBNAIL_MEDIUM => '',
								   self::THUMBNAIL_LARGE => '',
							);

	}

	/**
	 * get the id
	 * @return string
	 */
	public function getId()
	{

		return $this->_id;

	}

	/**
	 *
	 * set the id
	 * @param string $id
	 */
	public function setId($id)
	{

		$this->_id = $id;

	}

	/**
	 * get the title
	 * @return string
	 */
	public function getTitle()
	{

		return $this->_title;

	}

	/**
	 *
	 * set the title
	 * @param string $title
	 */
	public function setTitle($title)
	{

		$this->_title = $title;

	}

	/**
	 * get the description
	 * @return string
	 */
	public function getDescription()
	{

		return $this->_description;

	}

	/**
	 *
	 * set the description
	 * @param string $desc
	 */
	public function setDescription($desc)
	{

		$this->_description = $desc;

	}

	/**
	 * get the url
	 * @return string
	 */
	public function getUrl()
	{

		return $this->_url;

	}

	/**
	 *
	 * set the url
	 * @param string $url
	 */
	public function setUrl($url)
	{

		$this->_url = $url;

	}

	/**
	 *
	 * set the upload date
	 * @param DateTime $date
	 */
	public function setUploadDate(DateTime $date)
	{

		$this->_uploadDate = $date;

	}

	/**
	 * get the upload date / time
	 * @return DateTime
	 */
	public function getUploadDate()
	{

		return $this->_uploadDate;

	}

	/**
	 *
	 * set the duration
	 * @param long $duration
	 */
	public function setDuration($duration)
	{

		$this->_duration = $duration;

	}

	/**
	 * get the duration
	 * @return long
	 */
	public function getDuration()
	{

		return $this->_duration;

	}

	/**
	 *
	 * set the width
	 * @param int $width
	 */
	public function setWidth($width)
	{

		$this->_width = $width;

	}

	/**
	 * get the width
	 * @return int
	 */
	public function getWidth()
	{

		return $this->_width;

	}

	/**
	 *
	 * set the height
	 * @param int $height
	 */
	public function setHeight($height)
	{

		$this->_height = $height;

	}

	/**
	 * get the height
	 * @return int
	 */
	public function getHeight()
	{

		return $this->_height;

	}

	/**
	 *
	 * set the tags
	 * @param array $tags
	 */
	public function setTags(array $tags)
	{

		$this->_tags = $tags;

	}

	/**
	 * get the tags
	 * @return array
	 */
	public function getTags()
	{

		return $this->_tags;

	}

	/**
	 *
	 * set the small thumbnail
	 * @param string $value
	 */
	public function setSmallThumbnail($value)
	{

		$this->_setThumbnail(self::THUMBNAIL_SMALL, $value);

	}

	/**
	 *
	 * get the small thumbnail
	 * @return string
	 */
	public function getSmallThumbnail()
	{

		return $this->_getThumbnail(self::THUMBNAIL_SMALL);

	}

	/**
	 *
	 * set the medium thumbnail
	 * @param string $value
	 */
	public function setMediumThumbnail($value)
	{

		$this->_setThumbnail(self::THUMBNAIL_MEDIUM, $value);

	}

	/**
	 * get the medium thumbnail
	 * @return string
	 */
	public function getMediumThumbnail()
	{

		return $this->_getThumbnail(self::THUMBNAIL_MEDIUM);

	}

	/**
	 *
	 * set the large thumbnail
	 * @param string $value
	 */
	public function setLargeThumbnail($value)
	{

		$this->_setThumbnail(self::THUMBNAIL_LARGE, $value);

	}

	/**
	 * get the large thumbnail
	 * @return string
	 */
	public function getLargeThumbnail()
	{

		return $this->_getThumbnail(self::THUMBNAIL_LARGE);

	}

	/**
	 *
	 * set the thumbnail
	 * @param string $type
	 * @param string $value
	 */
	protected function _setThumbnail($type, $value)
	{

		$this->_thumbnails[$type] = $value;

	}

	/**
	 *
	 * get the thumbnail
	 * @param string $type
	 * @return string
	 */
	protected function _getThumbnail($type)
	{

		return $this->_thumbnails[$type];

	}

}
