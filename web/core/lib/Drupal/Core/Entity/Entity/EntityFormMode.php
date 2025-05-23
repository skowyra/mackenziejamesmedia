<?php

namespace Drupal\Core\Entity\Entity;

use Drupal\Core\Entity\Attribute\ConfigEntityType;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Entity\EntityDisplayModeBase;
use Drupal\Core\Entity\EntityFormModeInterface;

/**
 * Defines the entity form mode configuration entity class.
 *
 * Form modes allow entity forms to be displayed differently depending on the
 * context. For instance, the user entity form can be displayed with a set of
 * fields on the 'profile' page (user edit page) and with a different set of
 * fields (or settings) on the user registration page. Modules taking part in
 * the display of the entity form (notably the Field API) can adjust their
 * behavior depending on the requested form mode. An additional 'default' form
 * mode is available for all entity types. For each available form mode,
 * administrators can configure whether it should use its own set of field
 * display settings, or just replicate the settings of the 'default' form mode,
 * thus reducing the amount of form display configurations to keep track of.
 *
 * @see \Drupal\Core\Entity\EntityDisplayRepositoryInterface::getAllFormModes()
 * @see \Drupal\Core\Entity\EntityDisplayRepositoryInterface::getFormModes()
 */
#[ConfigEntityType(
  id: 'entity_form_mode',
  label: new TranslatableMarkup('Form mode'),
  entity_keys: [
    'id' => 'id',
    'label' => 'label',
    'description' => 'description',
  ],
  constraints: [
    'ImmutableProperties' => [
      'id',
      'targetEntityType',
    ],
  ],
  config_export: [
    'id',
    'label',
    'description',
    'targetEntityType',
    'cache',
  ],
  )]
class EntityFormMode extends EntityDisplayModeBase implements EntityFormModeInterface {

}
