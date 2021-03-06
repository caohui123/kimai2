<?php

/*
 * This file is part of the Kimai time-tracking app.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Type;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Custom form field type to select a customer.
 */
class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'label' => 'label.customer',
            'class' => Customer::class,
            'choice_label' => 'name',
            'query_builder' => function (CustomerRepository $repo) {
                return $repo->builderForEntityType(null);
            },
            //'attr' => ['class' => 'selectpicker', 'data-size' => 10, 'data-live-search' => true, 'data-width' => '100%']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return EntityType::class;
    }
}
