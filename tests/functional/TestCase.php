<?php

/*
 * This file is part of the 2amigos/yii2-chartjs-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests;

use yii\helpers\ArrayHelper;
use yii\web\AssetManager;
use yii\web\View;

/**
 * This is the base class for all yii framework unit tests.
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public static $params;

    /**
     * Mock application prior running tests.
     */
    protected function setUp(): void
    {
        $this->mockWebApplication(
            [
                'components' => [
                    'request' => [
                        'class' => 'yii\web\Request',
                        'url' => '/test',
                        'enableCsrfValidation' => false,
                    ],
                    'response' => [
                        'class' => 'yii\web\Response',
                    ],
                ],
            ]
        );
    }

    /**
     * Clean up after test.
     * By default the application created with [[mockApplication]] will be destroyed.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->destroyApplication();
    }

    /**
     * Asserting two strings equality ignoring line endings
     *
     * @param string $expected
     * @param string $actual
     */
    public function assertEqualsWithoutLE($expected, $actual): void
    {
        $expected = str_replace("\r\n", "\n", $expected);
        $actual = str_replace("\r\n", "\n", $actual);
        $this->assertEquals($expected, $actual);
    }

    protected function mockApplication($config = [], $appClass = '\yii\console\Application'): void
    {
        new $appClass(
            ArrayHelper::merge(
                [
                    'id' => 'testapp',
                    'basePath' => __DIR__,
                    'vendorPath' => $this->getVendorPath(),
                ],
                $config
            )
        );
    }

    protected function mockWebApplication($config = [], $appClass = '\yii\web\Application'): void
    {
        new $appClass(
            ArrayHelper::merge(
                [
                    'id' => 'testapp',
                    'basePath' => __DIR__,
                    'vendorPath' => $this->getVendorPath(),
                    'aliases' => [
                        '@bower' => '@vendor/bower-asset',
                        '@npm'   => '@vendor/npm-asset',
                    ],
                    'components' => [
                        'request' => [
                            'cookieValidationKey' => 'wefJDF8sfdsfSDefwqdxj9oq',
                            'scriptFile' => __DIR__ . '/index.php',
                            'scriptUrl' => '/index.php',
                        ],
                        'assetManager' => [
                            'basePath' => '@tests/assets',
                            'baseUrl' => '/',
                        ]
                    ]
                ],
                $config
            )
        );
    }

    protected function getVendorPath(): string
    {
        return dirname(__DIR__, 2) . '/vendor';
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication(): void
    {
        \Yii::$app = null;
    }

    /**
     * Creates a view for testing purposes
     *
     * @return View
     */
    protected function getView(): View
    {
        $view = new View();
        $view->setAssetManager(
            new AssetManager(
                [
                    'basePath' => '@tests/assets',
                    'baseUrl' => '/',
                ]
            )
        );

        return $view;
    }
}
