<?php namespace Linfo;

use Linfo\Get\GetInfoException;

class Linfo extends Base //implements LinfoInterface
{

	/**
	 * @return void
	 */
	public function __construct()
	{
		$this->os = $this->determineOS();
		$this->settings = $this->getSettings();
		$this->setupLinfo();
	}

	/**
	 * @return array
	 */
	public function getCore()
	{
		return array(
				'icon'          => strtolower($this->os),
				'os'            => $this->OSClass->getOS(),
				'distro'        => $this->OSClass->getDistro(),
				'kernel'        => $this->OSClass->getKernel(),
				'accessed_ip'   => isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'Unknown',
				'upTime'        => $this->OSClass->getUpTime(),
				'hostname'      => $this->OSClass->getHostName(),
				'cpus'          => $this->OSClass->getCPU(),
				'cpu_arch'      => $this->OSClass->getCPUArchitecture(),
				'load'          => $this->OSClass->getLoad(),
				'process_stats' => $this->OSClass->getProcessStats(),
			);
	}

	/**
	 * @return array
	 */
	public function getDevice()
	{
		return $this->OSClass->getDevs();
	}

	/**
	 * @return array
	 */
	public function getLoad()
	{
		return $this->OSClass->getLoad();
	}

	/**
	 * @return array
	 */
	public function getMemory()
	{
		return $this->OSClass->getRam();
	}

	/**
	 * @return array
	 */
	public function getMount()
	{
		return $this->OSClass->getMounts();
	}

	/**
	 * @return array
	 */
	public function getNetwork()
	{
		return $this->OSClass->getNet();
	}

	/**
	 * @return array
	 */
	public function getService()
	{
		return $this->OSClass->getServices();
	}

	/**
	 * @return array
	 */
	public function getSettings()
	{
		return array(
				'dates' => 'm/d/y h:i A (T)'
			);
	}

	/**
	 * @return void
	 */
	public function setupLinfo()
	{
		$this->OSClass = $this->loadOSClass($this->os, $this->settings);
	}

}