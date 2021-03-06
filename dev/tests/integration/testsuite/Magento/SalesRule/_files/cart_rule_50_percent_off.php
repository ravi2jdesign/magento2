<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/** @var \Magento\SalesRule\Model\Rule $salesRule */
$salesRule = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\SalesRule\Model\Rule');
$salesRule->setData(
    [
        'name' => '50% Off on Large Orders',
        'is_active' => 1,
        'customer_group_ids' => [\Magento\Customer\Model\GroupManagement::NOT_LOGGED_IN_ID],
        'coupon_type' => \Magento\SalesRule\Model\Rule::COUPON_TYPE_NO_COUPON,
        'conditions' => [
            [
                'type' => 'Magento\SalesRule\Model\Rule\Condition\Address',
                'attribute' => 'base_subtotal',
                'operator' => '>',
                'value' => 1000
            ]
        ],
        'simple_action' => 'by_percent',
        'discount_amount' => 50,
        'stop_rules_processing' => 1,
        'website_ids' => [
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
                'Magento\Store\Model\StoreManagerInterface'
            )->getWebsite()->getId()
        ]
    ]
);
$salesRule->save();
