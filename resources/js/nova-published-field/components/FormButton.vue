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

  mounted() {
    const formHeading = this.getFormHeading();
    const publishButton = this.$refs.publishButton;

    if (formHeading && publishButton) {
      formHeading.style.display = 'flex';
      formHeading.style['align-items'] = 'center';
      formHeading.append(publishButton);
    }
  },
};
</script>


<style>
form h1 > *:first-child {
  margin-left: auto;
}

form h1 > *:last-child {
  margin-right: 0;
}
</style>
