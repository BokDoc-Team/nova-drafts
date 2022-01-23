<template>
  <div>
    <publish-button :draftId="draftId" :resourceClass="field.class" ref="publishButton"/>

    <button
      ref="unpublishButton"
      type="button"
      className="mr-3 btn btn-default btn-danger text-base"
    >
      {{ this.field.name }}
    </button>
  </div>

</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova';
import PublishButton from './PublishButton';

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resource', 'resourceId', 'field'],
  components: {PublishButton},
  data() {
    return {
      draft: void 0,
      draftId: this.resource.id.value,
    };
  },

  methods: {},

  computed: {},
};
</script>
