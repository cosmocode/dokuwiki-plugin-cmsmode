<?php
/**
 * DokuWiki Plugin cmsmode (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Andreas Gohr <gohr@cosmocode.de>
 */
class action_plugin_cmsmode_start extends \dokuwiki\Extension\ActionPlugin
{

    /** @inheritDoc */
    public function register(Doku_Event_Handler $controller)
    {
        $controller->register_hook('DOKUWIKI_INIT_DONE', 'AFTER', $this, 'handleStart');
    }


    /**
     * Event handler for DOKUWIKI_INIT_DONE
     *
     * @see https://www.dokuwiki.org/devel:events:DOKUWIKI_INIT_DONE
     * @param Doku_Event $event Event object
     * @param mixed $param optional parameter passed when event was registered
     * @return void
     */
    public function handleStart(Doku_Event $event, $param) {
        global $conf;
        global $INPUT;

        if($INPUT->server->bool('REMOTE_USER')) return;

        if($this->getConf('breadcrumbs')) {
            $conf['breadcrumbs'] = 0;
        }
        if($this->getConf('youarehere')) {
            $conf['youarehere'] = 0;
        }

        $disabled = explode(',', $conf['disableactions'].','.$this->getConf('actions'));
        $disabled = array_map('trim', $disabled);
        $disabled = array_filter($disabled);
        $disabled = array_unique($disabled);
        $conf['disableactions'] = join(',', $disabled);
    }
}

