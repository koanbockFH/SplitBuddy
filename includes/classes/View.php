<?php

class View
{
	private $viewName = "";
	private $arrData = array();
	private $strBuffer = "";


	public function __construct($viewName, $currentPage = null)
	{
		$this->viewName = $viewName;
		$this->current = $currentPage;

	}

	protected function loadViewFromFile()
	{
		if(file_exists(VIEW_DIRECTORY.'/parts/header.php'))
		{
			ob_start();

			include(VIEW_DIRECTORY.'/parts/header.php');

			$strBuffer = ob_get_contents();

			ob_end_clean();

			$this->arrData['header'] = $strBuffer;
		}

		if(file_exists(VIEW_DIRECTORY.'/parts/footer.php'))
		{
			ob_start();

			include(VIEW_DIRECTORY.'/parts/footer.php');

			$strBuffer = ob_get_contents();

			ob_end_clean();

			$this->arrData['footer'] = $strBuffer;
		}


		if(file_exists(VIEW_DIRECTORY.$this->viewName.'.php'))
		{
			include(VIEW_DIRECTORY.$this->viewName.'.php');
		}


	}

	public function parse()
	{
		ob_start();

		$this->loadViewFromFile();

		$strBuffer = ob_get_contents();

		ob_end_clean();

		return $strBuffer;
	}

	public function output()
	{
		if (!$this->strBuffer)
		{
			$this->strBuffer = $this->parse();
		}

		header('Vary: User-Agent', false);
		header('Content-Type: text/html; charset=utf-8');


		echo $this->strBuffer;

		// Flush the output buffers (see #6962)
		$this->flushAllData();
	}

	/**
	 * Set an object property
	 *
	 * @param string $strKey   The property name
	 * @param mixed  $varValue The property value
	 */
	public function __set($strKey, $varValue)
	{
		$this->arrData[$strKey] = $varValue;
	}


	/**
	 * Return an object property
	 *
	 * @param string $strKey The property name
	 *
	 * @return mixed The property value
	 */
	public function __get($strKey)
	{
		if (isset($this->arrData[$strKey]))
		{
			if (is_object($this->arrData[$strKey]) && is_callable($this->arrData[$strKey]))
			{
				return $this->arrData[$strKey]();
			}

			return $this->arrData[$strKey];
		}
		else if($strKey == 'current')
		{
			return $this->viewName.'.html';
		}

		return null;
	}

	/**
	 * Set the template data from an array
	 *
	 * @param array $arrData The data array
	 */
	public function setData($arrData)
	{
		$this->arrData = $arrData;
	}


	/**
	 * Return the template data as array
	 *
	 * @return array The data array
	 */
	public function getData()
	{
		return $this->arrData;
	}


	/**
	 * Print all template variables to the screen using print_r
	 */
	public function showTemplateVars()
	{
		echo "<pre>\n";
		print_r($this->arrData);
		echo "</pre>\n";
	}


	/**
	 * Print all template variables to the screen using var_dump
	 */
	public function dumpTemplateVars()
	{
		var_dump($this->arrData);
	}

	/**
	 * Flush the output buffers
	 *
	 * @see Symfony\Component\HttpFoundation\Response
	 */
	public function flushAllData()
	{
		if (function_exists('fastcgi_finish_request'))
		{
			fastcgi_finish_request();
		}
		elseif (PHP_SAPI !== 'cli')
		{
			$status = ob_get_status(true);
			$level = count($status);

			while ($level-- > 0 && (!empty($status[$level]['del']) || (isset($status[$level]['flags']) && ($status[$level]['flags'] & PHP_OUTPUT_HANDLER_REMOVABLE) && ($status[$level]['flags'] & PHP_OUTPUT_HANDLER_FLUSHABLE))))
			{
				ob_end_flush();
			}

			flush();
		}
	}


}