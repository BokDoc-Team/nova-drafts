<template>
  <div>
    <div class="ml-3 flex items-center details-actions-container">
      <publish-button  :resourceClass="field.class" ref="publishButton" v-if="!field.value" />
    </div>
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
      draftId: this.resourceId,
    };
  },

  methods: {
  },

  computed: {

  },
};
</script>
