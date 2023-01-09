<?php

namespace App\Form;

use App\Class\Search;
use Symfony\Component\Form\AbstractType;

class SearchType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'GET'
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
