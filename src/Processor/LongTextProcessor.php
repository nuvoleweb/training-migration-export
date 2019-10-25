<?php

namespace NuvoleWeb\DrupalMigration\Processor;

/**
 * Process long text fields.
 */
class LongTextProcessor extends BaseProcessor
{
    /**
     * {@inheritdoc}
     */
    public function processAttributes(array &$attributes, \stdClass $entity, $language, array $configuration)
    {
        $destination = $configuration['destination'];
        $values = $this->getFieldValues($entity, $configuration['source'], $language, []);
        foreach ($values as $key => $value) {
            $this->setAttributeValue($attributes, $destination, $value['value']);
        }
    }
}
