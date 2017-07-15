<?php

namespace modules\user;

use Yii;
use yii\helpers\Inflector;

/**
 * GUI manager for RBAC.
 *
 * Use [[\yii\base\Module::$controllerMap]] to change property of controller.
 *
 * ```
 * 'controllerMap' => [
 *     'assignment' => [
 *         'class' => 'modules\user\controllers\AssignmentController',
 *         'userClassName' => 'app\models\User',
 *         'idField' => 'id'
 *     ]
 * ],
 * ```
 * @property string $mainLayout Main layout using for module. Default to layout of parent module.
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $defaultRoute = 'user';
    /**
     * @var array Nav bar items.
     */
    public $navbar;
    /**
     * @var string Main layout using for module. Default to layout of parent module.
     * Its used when `layout` set to 'left-menu', 'right-menu' or 'top-menu'.
     */
    public $mainLayout = '@backend/views/layouts/main.php';
    /**
     * @var array
     * @see [[menus]]
     */
    private $_menus = [];
    /**
     * @var array
     * @see [[menus]]
     */
    private $_coreItems = [
        'user' => 'Users',
        'assignment' => 'Assignments',
        'role' => 'Roles',
        'permission' => 'Permissions',
        'route' => 'Routes',
        'rule' => 'Rules',
    ];
    /**
     * @var array
     * @see [[items]]
     */
    private $_normalizeMenus;

    /**
     * @var string Default url for breadcrumb
     */
    public $defaultUrl;

    /**
     * @var string Default url label for breadcrumb
     */
    public $defaultUrlLabel;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['rbac-admin'])) {
            Yii::$app->i18n->translations['rbac-admin'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@modules/user/messages',
            ];
        }

        //user did not define the Navbar?
        if ($this->navbar === null && Yii::$app instanceof \yii\web\Application) {
            $this->navbar = [
                ['label' => Yii::t('rbac-admin', 'Help'), 'url' => ['default/index']],
                ['label' => Yii::t('rbac-admin', 'Application'), 'url' => Yii::$app->homeUrl],
            ];
        }
        if (class_exists('yii\jui\JuiAsset')) {
            Yii::$container->set('modules\user\AutocompleteAsset', 'yii\jui\JuiAsset');
        }
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /* @var $action \yii\base\Action */
            $view = $action->controller->getView();
            
            $view->params['breadcrumbs'][] = [
                'label' => ($this->defaultUrlLabel ?: Yii::t('rbac-admin', 'Admin')),
                'url' => ['/' . ($this->defaultUrl ?: $this->uniqueId)],
            ];
            return true;
        }
        return false;
    }
}
