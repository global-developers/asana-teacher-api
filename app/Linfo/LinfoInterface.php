<?php namespace Linfo;

interface LinfoInterface
{
	/**
	 * @return array
	 */
	public function getCore();

	/**
	 * @return array
	 */
	public function getDevice();

	/**
	 * @return array
	 */
	public function getLoad();

	/**
	 * @return array
	 */
	public function getHD();

	/**
	 * @return array
	 */
	public function getMemory();

	/**
	 * @return array
	 */
	public function getMount();
}