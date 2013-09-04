<?php
/**
 * YiiTest class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-testingtools.unit
 */

/**
 * Test case that allows to mock an Yii application.
 */
class YiiTest extends \Codeception\TestCase\Test
{
    /**
     * Mocks a Yii application with the given configuration.
     * @param array $config application configuration.
     * @param string $appClass application class name.
     */
    protected function mockApplication($config = array(), $appClass = 'TestApplication')
    {
        $defaultConfig = array(
            'basePath' => __DIR__,
        );
        Yii::createApplication(
            $appClass,
            CMap::mergeArray($defaultConfig, $config)
        );
    }

    /**
     * Destroys the mocked Yii application.
     */
    protected function destroyApplication()
    {
        Yii::setApplication(null);
    }

    /**
     * Actions to take after destroying the this test case.
     */
    protected function _after()
    {
        $this->destroyApplication();
    }
}
