<template>
  <button class="ml-3 btn btn-default btn-primary text-base" ref="publishButton" type="button" v-on:click="publish">
    {{ __('novaDrafts.publishButtonText') }}
  </button>
</template>

<script>
export default {
  props: ['draftId', 'resourceClass'],

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
