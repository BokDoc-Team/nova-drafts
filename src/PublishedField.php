<?php

namespace OptimistDigital\NovaDrafts;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\FieldElement;
use OptimistDigital\NovaDrafts\Models\Draft;

class PublishedField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-published-field';

    /**
     * DraftButton field's enabled variable
     *
     * @var boolean
     */
    protected $enabled = true;

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|null $attribute
     * @param mixed|null $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, 'published', $resolveCallback);

        $this->withMeta([
            'asHtml' => true,
        ]);

        if (!$this->enabled) {
            $this->hideWhenCreating();
            $this->hideWhenUpdating();
            $this->hideFromDetail();
            $this->hideFromIndex();
        } else {
            $this->exceptOnFormsData();
        }
    }

    /**
     * Specify that the element should be hidden from forms.
     *
     * @return $this
     */
    public function exceptOnFormsData()
    {
        $this->showOnIndex = true;
        $this->showOnDetail = true;
        $this->showOnCreation = false;
        $this->showOnUpdate = true;

        return $this;
    }


    public function resolve($resource, $attribute = null)
    {
        parent::resolve($resource, $attribute);

        $this->withMeta([
            'class' => get_class($resource),
            'childDraft' => Draft::childDraft(get_class($resource), $resource->id),
            'draftParent' => Draft::draftParent(get_class($resource), $resource->draft_parent_id)
        ]);
    }

    public function draftsEnabled($enabled)
    {
        return $this->enabled = $enabled;
    }
}
