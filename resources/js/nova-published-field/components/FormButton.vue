<template>
      <publish-button :draftId="draftId" :resourceClass="field.class" ref="publishButton" v-if="!field.value" />
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
