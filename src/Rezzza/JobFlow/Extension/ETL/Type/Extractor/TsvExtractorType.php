<?php

namespace Rezzza\JobFlow\Extension\ETL\Type\Extractor;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Rezzza\JobFlow\AbstractJobType;

class TsvExtractorType extends AbstractJobType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $type = $this;

        $resolver->setDefaults(array(
            'etl_config' => function(Options $options) use ($type) {
                $io = $options['io'];

                return array(
                    'class' => $options['class'],
                    'args' => array($io->stdin->getDsn(), "\t")
                );
            } 
        ));
    }

    public function getName()
    {
        return 'tsv_extractor';
    }

    public function getParent()
    {
        return 'csv_extractor';
    }
}