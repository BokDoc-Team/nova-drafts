<template>
  <div>
    <button
      ref="createNovaDraftButton"
      type="button"
      className="ml-3 btn btn-default btn-primary"
      id="create-draft-button"
      v-on:click="publish"
      v-if="!field.isDraft"
    >
      {{ __('novaDrafts.publishButtonText') }}
    </button>

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
    async publish() {
      try {
        const response = await Nova.request().post(`/nova-vendor/nova-drafts/draft-publish/${this.draftId}`, {
          class: this.resourceClass,
        });

        if (this.draftId === response.data.id) {
          this.$router.go(null);
        } else {
          this.$router.push(`${response.data.id}`);
        }

        this.$toasted.show(this.__('novaDrafts.publishSuccessToast'), {type: 'success'});
      } catch (e) {
        console.error(e);
        this.$toasted.show(this.__('novaDrafts.publishFailedToast'), {type: 'error'});
      }
    },
  },

  computed: {
    isDraft() {
      return !this.field.value || (this.field.value && (this.field.childDraft || this.field.draftParent));
    },
  },
};
</script>
