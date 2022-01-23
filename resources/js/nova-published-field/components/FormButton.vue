<template>
  <div>
  <publish-indicator :draft="isDraft" :published="field.value" />
  <publish-button :draftId="draftId" :resourceClass="field.class"  v-if="!field.value" class="button_publish" />
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
    isDraft() {
      return this.field.isDraft;
    },
  },
};
</script>

<style scoped>
.button_publish{
  float: left;
}
</style>
