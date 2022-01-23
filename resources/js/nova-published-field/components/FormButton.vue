<template>
  <div>
    <div class="ml-3 flex items-center details-actions-container">
      <publish-button :draftId="draftId" :resourceClass="field.class" ref="publishButton" v-if="!field.value" />
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
      draftId: this.resourceId,
    };
  },

  methods: {
  },

  computed: {

  },
};
</script>
