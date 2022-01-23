<template>
<!--  <publish-button :draftId="draftId" :resourceClass="field.class"  v-if="!field.value" class="button_publish" />-->
  <button class="ml-3 btn btn-default btn-primary text-base" :resourceClass="field.class" ref="publishButton" type="button" v-on:click="publish">
    {{ __('novaDrafts.publishButtonText') }}
  </button>
</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova';

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resource', 'resourceId', 'field', 'resourceName'],
  data() {
    return {
      draftId: this.resourceId,
    };
  },

  methods: {
    async publish() {
      try {
        const response = await Nova.request().post(`/nova-vendor/nova-drafts/draft-publish/${this.draftId}`, {
          class: this.resourceClass,
        });

        this.$router.go(null);


        this.$toasted.show(this.__('novaDrafts.publishSuccessToast'), { type: 'success' });
      } catch (e) {
        this.$toasted.show(this.__('novaDrafts.publishFailedToast'), { type: 'error' });
      }
    },
  },
};
</script>

<style scoped>

</style>
