<?php

namespace NuvoleWeb\DrupalMigration\Processor;

/**
 * Process file fields, only exporting whitelisted properties.
 */
class FileProcessor extends BaseProcessor
{
    /**
     * {@inheritdoc}
     */
    public function processAttributes(array &$attributes, \stdClass $entity, $language, array $configuration)
    {
        $destination = $configuration['destination'];
        $values = $this->getFieldValues($entity, $configuration['source'], $language, []);
        foreach ($values as $key => $items) {
            foreach ($items as $property => $value) {
                if (in_array($property, $configuration['whitelist'])) {
                    $this->setAttributeValue($attributes, $destination . '_' . $property, $value);
                }
            }
        }
    }
}
