<?php
namespace Craft;

use Recurr;

class DatalistFieldType extends BaseFieldType
{
	public function getName()
	{
		return Craft::t('Datalist');
	}

	/**
	 * Defines the settings.
	 *
	 * @access protected
	 * @return array
	 */
	protected function defineSettings()
	{
		return array(
			'placeholder'   => array(AttributeType::String)
		);
	}

	/**
	 * Returns the field's settings HTML.
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		return craft()->templates->render('datalist/settings', array(
			'settings' => $this->getSettings()
		));
	}

	/**
	 * Display fieldtype
	 *
	 * @param string $name  Fieldtype handle
	 * @param string $vaoue  Fieldtype value
	 * @return string Return Fields input template
	 */
	public function getInputHtml($name, $value)
	{
		$datalist = craft()->db->createCommand()
							   ->selectDistinct('field_' . $name)
							   ->where('locale = :locale', array(':locale' => craft()->locale->id))
							   ->andWhere('field_' . $name . ' IS NOT NULL')
							   ->andWhere('field_' . $name . ' != ""')
							   ->from('content')
							   ->queryColumn();

		// Our value may not yet be part of datalist if a new entry
		// was submitted but there were validation errors.
		// In that case we still want it to appear in the list.
		if($value && ! in_array($value, $datalist))
		{
			$datalist[] = $value;
		}

		// Reformat the input name into something that looks more like an ID
		$id = craft()->templates->formatInputId($name);

		// Figure out what that ID is going to look like once it has been namespaced
		$namespacedId = craft()->templates->namespaceInputId($id);

		$attrs = array(
			'id' => $id,
			'name' => $name,
			'value' => $value,
			'datalist' => $datalist,
			'namespacedId' => $namespacedId,
			'settings' => $this->getSettings(),
			'isListNamespaced' => (version_compare(craft()->getVersion() . '.' . craft()->getBuild(), '2.0.2541') >= 0)
		);

		craft()->templates->includeJsResource('datalist/js/datalist.js');
		craft()->templates->includeJs("$('#{$namespacedId}').datalist();");

		return craft()->templates->render('datalist/input', $attrs);
	}
}