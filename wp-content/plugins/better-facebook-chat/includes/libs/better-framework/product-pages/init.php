<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */

// todo add support for using product page in multiple product!
// Ex: welcome page url is admin.php?page=bs-product-pages-welcome
// and we cannot detect which product is active

// todo refactor product pages for new home

define( 'BF_PRODUCT_PAGES_URI', BF_URI . 'product-pages/' );
define( 'BF_PRODUCT_PAGES_PATH', BF_PATH . 'product-pages/' );

include BF_PRODUCT_PAGES_PATH . 'core/class-bf-product-pages-base.php';

include BF_PRODUCT_PAGES_PATH . 'core/class-bf-product-item.php';

include BF_PRODUCT_PAGES_PATH . 'core/class-bf-product-multi-step-item.php';

include BF_PRODUCT_PAGES_PATH . 'core/class-bf-product-pages.php';

include BF_PRODUCT_PAGES_PATH . 'core/functions.php';

