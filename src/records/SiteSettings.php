<?php


namespace elleracompany\cookieconsent\records;

use craft\db\ActiveRecord;
use elleracompany\cookieconsent\CookieConsent;
use yii\db\ActiveQueryInterface;

/**
 * This is the model class for table "auth_item".
 *
 * @property boolean 	$activated
 * @property integer 	$site_id
 * @property string 	$headline
 * @property string 	$description
 * @property string		$template
 */
class SiteSettings extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public function fields()
	{
		$fields = [
			'site_id',
			'activated',
			'headline',
			'description',
			'template'
		];
		return array_merge($fields, parent::fields());
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName(): string
	{
		return CookieConsent::SITE_SETTINGS_TABLE;
	}

	public function rules()
	{
		return [
			[['headline', 'description', 'template'], 'string'],
			[['headline', 'description', 'template'], 'required'],
			['activated', 'boolean'],
			['activated', 'default', 'value' => 0],
			['site_id', 'integer']
		];
	}

	/**
	 * Returns the site’s cookie groups.
	 *
	 * @return ActiveQueryInterface The relational query object.
	 */
	public function getCookieGroups(): ActiveQueryInterface
	{
		return $this->hasMany(CookieGroup::class, ['site_id' => 'site_id']);
	}
}
