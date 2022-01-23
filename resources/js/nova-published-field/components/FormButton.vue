<template>
      <publish-button :draftId="draftId" :resourceClass="field.class"  v-if="!field.value" class="button_publish" />
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

  mounted() {
  },
};
</script>

<style scoped>
.button_publish{
  margin-left: auto;
  margin-right: 0;
}
</style>
