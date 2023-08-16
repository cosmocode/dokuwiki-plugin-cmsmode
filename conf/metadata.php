<?php
/**
 * Options for the cmsmode plugin
 *
 * @author Andreas Gohr <gohr@cosmocode.de>
 */


$meta['breadcrumbs'] = array('onoff');
$meta['youarehere'] = array('onoff');

$meta['actions'] = array(
    'disableactions',
    '_choices' => array(
        'backlink',
        'index',
        'recent',
        'revisions',
        'media',
        'search',
        'source',
        'export_raw',
        'rss',
        'top',
    ),
);

