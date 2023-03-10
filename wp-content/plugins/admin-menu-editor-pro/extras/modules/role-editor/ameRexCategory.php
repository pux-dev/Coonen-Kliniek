<?php

class ameRexCategory {
	public $name = '';
	public $componentId = null;
	public $capabilities = array();
	public $slug = '';

	/**
	 * @var ameRexCategory[]
	 */
	public $subcategories = array();

	public function __construct($name = '', $componentId = null) {
		$this->name = $name;
		$this->componentId = $componentId;
	}

	/**
	 * Does this category contain a specific capability either directly or in a subcategory?
	 *
	 * @param string $capability
	 * @return boolean
	 */
	public function hasCapability($capability) {
		if (isset($this->capabilities[$capability])) {
			return true;
		}
		foreach ($this->subcategories as $subcategory) {
			if ($subcategory->hasCapability($capability)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param ameRexCategory $category
	 */
	public function addSubcategory($category) {
		if (!empty($category->slug)) {
			$this->subcategories[$category->slug] = $category;
		} else {
			$this->subcategories[] = $category;
		}
	}

	/**
	 * @param string $capability
	 */
	public function addCapabilityToDefaultLocation($capability) {
		//TODO: Handle the situation where the default is a "General" subcategory or something like that.
		$this->capabilities[$capability] = true;
	}

	public function toArray() {
		$result = array(
			'name'         => $this->name,
			'componentId'  => $this->componentId,
			'capabilities' => array_keys($this->capabilities),
		);
		if (!empty($this->subcategories)) {
			$result['subcategories'] = array();
			foreach ($this->subcategories as $subcategory) {
				$result['subcategories'][] = $subcategory->toArray();
			}
		}
		if (($this->slug !== '') && ($this->slug !== null)) {
			$result['slug'] = $this->slug;
		}
		return $result;
	}
}

abstract class ameRexExtendedCategory extends ameRexCategory {
	protected $variant = null;
	protected $contentTypeId = null;
	/**
	 * @var string[]
	 */
	public $permissions = array();

	public function __construct($name = '', $componentId = null, $contentTypeId = null, $permissions = array()) {
		parent::__construct($name, $componentId);
		$this->permissions = $permissions;
		$this->contentTypeId = $contentTypeId;
	}

	public function hasCapability($capability) {
		if (parent::hasCapability($capability)) {
			return true;
		}

		/*
		 * Check if the capability is used by one of the permissions.
		 *
		 * Implementation note: This code does not use in_array() because, in loose
		 * comparison mode, it will produce crazy results like treating "abc" and
		 * the boolean TRUE as equal. Unfortunately, strict mode also does not work
		 * here because some capabilities can be represented as either numbers or
		 * numeric strings. PHP converts numeric strings to numbers when WordPress
		 * uses them as array indexes.
		 *
		 * Instead, we use a standard loop with a strict comparison, plus a special
		 * case for numeric capabilities.
		 */

		$isNeedleNumeric = is_numeric($capability);
		$needleAsString = (string)$capability;

		foreach ($this->permissions as $capName) {
			if (
				//Strict equality check first.
				($capName === $capability)
				//Relaxed comparison for numbers.
				|| ($isNeedleNumeric && ($needleAsString === (string)$capName))
			) {
				return true;
			}
		}

		return false;
	}

	public function toArray() {
		$result = parent::toArray();
		$result['variant'] = $this->variant;
		$result['permissions'] = $this->permissions;
		$result['contentTypeId'] = $this->contentTypeId;
		unset($result['capabilities']);
		return $result;
	}
}


class ameRexPostTypeCategory extends ameRexExtendedCategory {
	protected $variant = 'post_type';
}

class ameRexTaxonomyCategory extends ameRexExtendedCategory {
	protected $variant = 'taxonomy';
}