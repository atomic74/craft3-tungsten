<?php
/**
 * Tungsten plugin for Craft CMS 3.x
 *
 * Miscellaneous goodies needed for Tungsten Craft projects
 *
 * @link      http://atomic74.com
 * @copyright Copyright (c) 2018 Tungsten Creative
 */

namespace tungsten\tungsten\models;

use tungsten\tungsten\Tungsten;

use Craft;
use craft\base\Model;

/**
 * @author    Tungsten Creative
 * @package   Tungsten
 * @since     2
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $tcgTrainingVideosUrl = '';
    public $tcgNotes = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            ['tcgTrainingVideosUrl', 'string'],
            ['tcgTrainingVideosUrl', 'default', 'value' => ''],
            ['tcgNotes', 'string'],
            ['tcgNotes', 'default', 'value' => ''],
        ];
    }
}
