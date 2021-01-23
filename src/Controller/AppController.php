<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->response->setTypeMap('turbo_stream', 'text/vnd.turbo-stream.html');
        $this->loadComponent('Flash');

        if ($this->isTurbo()) {
            $this->viewBuilder()->setLayout('ajax');
        }

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        $this->loadComponent('FormProtection');
    }

    /**
     * @return bool
     */
    public function isTurbo(): bool
    {
        return (bool)$this->getRequest()->accepts('text/vnd.turbo-stream.html');
        //        return $this->getRequest()->getHeader('Turbo-Frame') !== [];
    }

    /**
     * @param string|array|\Psr\Http\Message\UriInterface $url A string, array-based URL or UriInterface instance.
     * @param int $status HTTP status code. Defaults to `302`.
     * @return Response|null
     */
    public function redirectOrTurbo($url, $status = 302): ?Response
    {
        if (!$this->isTurbo()) {
            return $this->redirect($url, $status);
        }
        return null;
    }

    public function afterFilter(EventInterface $event)
    {
        if ($this->isTurbo()) {
            $this->RequestHandler->respondAs('turbo_stream');
        }
        parent::beforeRender($event);
    }
}
