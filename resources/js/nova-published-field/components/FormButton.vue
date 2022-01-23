<template>
  <div>
    <publish-button :draftId="draftId" :resourceClass="field.class" ref="publishButton"/>
  </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';
import PublishButton from './PublishButton';

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resource', 'resourceId', 'field'],
  components: { PublishButton },
  data() {
    return {
      draft: void 0,
      draftId: this.resource.id.value,
    };
  },

  methods: {

  },

  computed: {

  },
};
</script>
