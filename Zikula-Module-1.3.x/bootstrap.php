<?php
%header%

// Bootstrap - Used for global setup at module load time.
$helper = ServiceUtil::getService('doctrine_extensions');
$helper->getListener('sluggable');
$helper->getListener('standardfields');

