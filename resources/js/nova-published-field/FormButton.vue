<template>
  <publish-button :draftId="draftId" :resourceClass="field.class"  v-if="!field.value" class="button_publish" />
</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova';
import PublishButton from './components/PublishButton.vue';

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resource', 'resourceId', 'field', 'resourceName'],
  components: {PublishButton},
  data() {
    return {
      draftId: this.resourceId,
    };
  },

  methods: {
  },
};
</script>

<style scoped>

</style>
